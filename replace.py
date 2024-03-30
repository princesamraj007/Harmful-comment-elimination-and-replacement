
from flask import Flask, render_template, request, jsonify
from flask import Flask, send_from_directory
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.multioutput import MultiOutputClassifier
from sklearn.linear_model import LogisticRegression
import spacy
from flask import session
import mysql.connector



app = Flask(__name__, static_folder='static')
app.secret_key = b'_5#y2L"F4Q8z\n\xec]/'
df = pd.read_csv('C:\\Users\\prince sam raj\\Downloads\\PROJ PHASE\\comment proj\\train.csv')


X = df['comment_text']
y = df.drop(columns=['comment_text','id'])

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

vectorizer = TfidfVectorizer(max_features=10000)
X_train_vect = vectorizer.fit_transform(X_train)
X_test_vect = vectorizer.transform(X_test)



classifier = MultiOutputClassifier(LogisticRegression(max_iter=1000))
classifier.fit(X_train_vect, y_train)

toxic_phrases = {
    "wtf": "What's this",
    "are shit": "can try better",
    "Shit": "oh my god",
    "shit": "oh my god",
    "thats shit": "thats not good",
    "no one cares": "I disagree",
    "fuck": "that's my bad",
    "damn": "darn",
    "stupid": "misguided",
    "waste of space": "your presence makes a difference",
    "fat": "plus-sized",
    "ass": "guy",
    "ugly": "visually different",
    "suck": "wonderful",
    "shut up": "please, let others speak",  
    "I hate this": "I'd prefer something different",
    "you're a failure": "you're capable of more",
    "you're worthless": "You have value and deserve respect",
    "you're a loser": "you're unique and valuable",
    "ur useless": "try better",
    "useless": "better",
    "poda punda": "idly sambar",
    "You always mess things up": "Let's find a solution together",
    "hate": "misunderstood",
    "kill yourself": "take care of yourself",
    "worthless": "valuable in unique ways",
    "I give up": "I need a break",
    "I can't do this": "I'll find a way",
    "you black": "you're a valued person",
    "white trash": "person from a difficult background",
    "yellow-skinned": "person of Asian descent",
    "redskin": "person of Indigenous heritage",
    "brown people": "individuals of diverse ethnicities",
    "Die":"You're valued here",
    "pathetic loser":"You're valued here",
    "Ugly":"You're beautiful inside",
    "No one likes you":"You're not alone",
    "Stupid":"You're capable, worthy",
    "failure":"You're capable, worthy",
    "useless":"You're capable, worthy",
    "Just give up":"You're worth fighting for",
    "Worthless":"You're valuable, worthy",
    "waste of time":"You're valuable, worthy",
    "Hopeles": "You're stronger than you think",
    "pathetic": "You're stronger than you think",
    "Go away forever": "You're welcome here",
    "You'll never succeed":"You're capable of greatness",
    "You're such a burden":"You're not alone here",
    "half-breed": "person of mixed heritage",
    "darkie": "person with a darker complexion",
    "people": "guys",
    "I'll kill you": "I strongly disagree",
    "I'll hurt you": "I'm upset",
    "I'll find you": "I'm concerned",
    "I'll make you pay": "I'm frustrated",
    "You are dead": "I'm really angry",
    "You're dead": "I'm really angry",
    "I'll destroy you": "I'm really upset",
    "crap": "Oops",
    "bitch": "Assertive",
    "asshole": "Inconsiderate",
    "whore": "Sexually empowered",
    "slut": "Sexually liberated",
    "cunt head": "Strong-willed person",
    "cunt": "Strong-willed",
    "You're stupid":"I disagree with your opinion",
    "faggot": "Different",
    "retard": "Intellectually challenged",
    "midget": "Vertically challenged",
    "tranny": "Transgender person",
    "queer": "Non-heteronormative",
    "freak": "Unique individual",
    "psycho": "Emotionally complex",
    "nerd": "Intellectually curious",
    "geek": "Passionate about interests",
    "dumb": "Uninformed",
    "lame": "Uninteresting",
    "weird": "Unique",
    "fool": "Misinformed",
    "crazy": "Unconventional",
    "wimp": "Sensitive",
    "sissy": "Emotionally expressive",
    "retarded": "Slow to understand",
    "idiotic": "Unwise",
    "ignorant": "Unaware",
    "hick": "Rural dweller",
    "hillbilly": "Rural resident",
    "redneck": "Rural individual",
    "peasant": "Rural inhabitant",
    "uncivilized": "Less culturally exposed",
    "Idiotic": "Unwise",
    "nigga": "buddy"
}


def replace_toxic_words(comment, toxic_phrases):
    replaced_comment = comment.lower()  
    for toxic_word, replacement in toxic_phrases.items():
        if toxic_word.lower() in replaced_comment:  
            replaced_comment = replaced_comment.replace(toxic_word.lower(), replacement)
    return replaced_comment


nlp = spacy.load("en_core_web_sm")

def predict_toxicity(input_text):
    input_vect = vectorizer.transform([input_text])
    predictions = classifier.predict(input_vect)
    toxic_attributes = y.columns[predictions.flatten() == 1]
    return toxic_attributes


def update_score(toxic):
    target_user = session.get("username")
    
    print("Target User:", target_user)

    try:
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password="1234",
            database="policy_holders"
        )
        cursor = conn.cursor()

        if toxic:
            cursor.execute("UPDATE users SET score = score + 30 WHERE username = %s", (target_user,))
        else:
            cursor.execute("UPDATE users SET score = score - 5 WHERE username = %s", (target_user,))

        conn.commit()
    except mysql.connector.Error as err:
        
        print("Database error:", err)
    finally:
        if 'conn' in locals():
            conn.close()
        if 'cursor' in locals():
            cursor.close()

@app.route('/')
def index():
    username = request.args.get('username')
    if username:
        session['username'] = username
    return render_template('ind.html')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    user_input = data['comment']
    print("Received comment:", user_input)  
    toxic_attributes = predict_toxicity(user_input)
    print("Toxic Attributes:", toxic_attributes)  
    if len(toxic_attributes) > 0:
        replaced_comment = replace_toxic_words(user_input, toxic_phrases)
        print("Replaced Comment:", replaced_comment)  
        update_score(True)
        return jsonify({"toxic_attributes": list(toxic_attributes), "comment": replaced_comment})
    else:
        update_score(False)
        return jsonify({"toxic_attributes": [], "comment": user_input})

if __name__ == '__main__':
    app.run(debug=True)
