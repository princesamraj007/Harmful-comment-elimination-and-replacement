<?php
        
        if (isset($_GET['username'])) {
            $variable = urldecode($_GET['username']);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Platform</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/login-register/style.css">
</head>
<body>
    <nav>
        <div class="container">
            
            
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Search for Creators, Inspirations and more">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="create-post">Create</label>
                <div class="profile-photo">
                    <img src="http://localhost/login-register/images/profile-1.png" alt="hi">
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="http://localhost/login-register/images/profile-1.png" alt="hi">
                    </div>
                    <div class="handle">
                        <h4>
                        <?php
                            echo "Welcome " . $variable;
                        ?>
            
                        </h4>
                        <p class="text-muted">
                            <?php
                                echo "@" . $variable;
                            ?>
                        </p>
                    </div>    
                </a>

                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span><h3>Home</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-compass"></i></span><h3>Explore</h3>
                    </a>
                    <a class="menu-item" id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span><h3>Notification</h3>
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="http://localhost/login-register/images/profile-2.jpg" alt="hi">
                                </div>
                                <div class="notification-body">
                                    <b>Venky</b> accepted your friend request
                                    <small class="text-muted">2 DAYS AGO </small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="menu-item" id="messages-notifications">
                        <span><i class="uil uil-message"><small class="notification-count">6</small></i></span><h3>Messages</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-bookmark"></i></span><h3>Bookmarks</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-palette"></i></span><h3>Theme</h3>
                    </a>
                    <a class="menu-item active">
                        <span><i class="uil uil-setting"></i></span><h3>Settings</h3>
                    </a>   
                </div>
                <label for="create-post" class="btn btn-primary">Create post</label>
            </div>
            <div class="middle">
                <div class="stories">
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-8.jpg" alt="hi">
                        </div>
                        <div class="name">Prince</div>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-9.jpg" alt="hi">
                        </div>
                        <div class="name">Varshan</div>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-10.jpg" alt="hi">
                        </div>
                        <div class="name">BD vinay</div>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-11.jpg" alt="hi">
                        </div>
                        <div class="name">ineeddp123</div>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-12.jpg" alt="hi">
                        </div>
                        <div class="name">Godhavari</div>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="http://localhost/login-register/images/profile-13.jpg" alt="hi">
                        </div>
                        <div class="name">KokkiKumar</div>
                    </div>
                </div>
                <form class="create-post">
                    <div class="profile-photo">
                        <img src="http://localhost/login-register/images/profile-1.png" alt="hi">
                    </div>
                    <input type="text" placeholder="What's on your mind ?" id="create-post"s>
                    <input type="submit" value="Post" class="btn btn-primary">
                </form>

                <div class="feeds">
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="http://localhost/login-register/images/profile-10.jpg" alt="hi">
                                </div>
                                <div class="info">
                                    <h3>Lana Rose</h3>
                                    <small>Dubai, 15 mins ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>
                        <div class="photo">
                            <img src="http://localhost/login-register/images/feed-1.jpg" alt="hi">
                        </div>
                        <div class="action-buttons">
                            <div class="interaction-button">
                                <button style="font-size: 21px; background-color: white;"><i class="uil uil-heart"></i></button>
                                <button onclick="toggleComment('commentInput1', 'okButton1')" style="font-size: 20px;background-color: white;"><i class="uil uil-comment"></i></button>
                                <button style="font-size: 20px;background-color: white;"><i class="uil uil-message"></i></button>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark"></i></span>
    
                            </div>
                            
                        </div>
                        <div class="liked-by">
                            <span><img src="http://localhost/login-register/images/profile-10.jpg" alt="hi"></span>
                            <span><img src="http://localhost/login-register/images/profile-11.jpg" alt="hi"></span>
                            <span><img src="http://localhost/login-register/images/profile-6.jpg" alt="hi"></span>
                            <p>Liked by <b>Vissshhhh</b> and <b>2.372 others</b></p>
                        </div>
                        <div class="caption">
                            <p>One fine day <span class="harsh-tag">#happy</span></p>
                        </div>
                        <div class="comments text-muted">View all 277 comments</div>
                        <div id="commentInput1" class="comment-input">
                            <input type="text" id="commentInputBox1" placeholder="Enter your comment...">
                        </div>
                        <button class="button ok-button" id="okButton1" onclick="predict('commentInputBox1', 'result1')" style="font-size: 21px; background-color: white;"><i class="uil uil-enter"></i></button>
                        <div id="result1"></div>
                    </div>   
                </div>

                

                <div class="post-container">
                    <img class="post-image" src="http://localhost/login-register/images/westind.jpg" alt="Post Image">
                    <div class="post-actions">
                        <button class="button like">Like</button>
                        <button class="button comment" onclick="toggleComment('commentInput2', 'okButton2')">Comment</button>
                        <button class="button share">Share</button>
                    </div>
                    <div id="commentInput2" class="comment-input">
                        <input type="text" id="commentInputBox2" placeholder="Enter your comment...">
                    </div>
                    <button class="button ok-button" id="okButton2" onclick="predict('commentInputBox2', 'result2')">post</button>
                    <div id="result2"></div>
                </div>

                <div class="post-container">
                    <img class="post-image" src="https://via.placeholder.com/800x400" alt="Post Image">
                    <div class="post-actions">
                        <button class="button like">Like</button>
                        <button class="button comment" onclick="toggleComment('commentInput3', 'okButton3')">Comment</button>
                        <button class="button share">Share</button>
                    </div>
                    <div id="commentInput3" class="comment-input">
                        <input type="text" id="commentInputBox3" placeholder="Enter your comment...">
                    </div>
                    <button class="button ok-button" id="okButton3" onclick="predict('commentInputBox3', 'result3')">post</button>
                    <div id="result3"></div>
                </div>
            </div>
            <div class="right">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, nulla.
            </div>
        </div>
    </main>

    <script>
        function toggleComment(commentInputId, okButtonId) {
            var commentInput = document.getElementById(commentInputId);
            var okButton = document.getElementById(okButtonId);
            if (commentInput.style.display === "none") {
                commentInput.style.display = "block";
                okButton.style.display = "block";
            } else {
                commentInput.style.display = "none";
                okButton.style.display = "none";
            }
        }

        function predict(commentInputId, resultId) {
            var comment = document.getElementById(commentInputId).value;
            fetch('/predict', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ comment: comment })
            })
            .then(response => response.json())
            .then(data => {
                var resultDiv = document.getElementById(resultId);
                if (data.toxic_attributes.length > 0) {
                    resultDiv.innerHTML = "<p>Toxic attributes detected: " + data.toxic_attributes.join(", ") + "</p>" +
                                          "<p>Replaced comment: " + data.comment + "</p>";
                } else {
                    resultDiv.innerHTML = "<p>No toxic attributes detected.</p>" +
                                          "<p>Original comment: " + data.comment + "</p>";
                }
            });
        }
    </script>

  

  
</body>
</html>

