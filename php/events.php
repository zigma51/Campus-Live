<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" type="image/png" href="../media/favicon1.png" />
        <link rel="stylesheet" href="../css/events.css?v=<?php echo time(); ?>" />
        <title>CampusLive Events</title>
        <link
            href="../fonts/MeriendaOne/MeriendaOne.css?v=<?php echo time(); ?>"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="../fonts/fontawesome/css/fontawesomeicons.css?v=<?php echo time(); ?>"
        />
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?v=<?php echo time(); ?>"
        />
        <link rel="stylesheet" href="css/reset.css?v=<?php echo time(); ?>" />
    </head>

    <body>
        <div id="fb-root"></div>
        <script
            async
            defer
            crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"
        ></script>
        <nav id="navbar" class="sticky">
            <span class="left logo campus">Campus<span class="logo live">Live</span></span>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="nav-links">
                <li class="icon"><button type="button" name="btn-menu">&#9776;</button></li>
                <li class="right">
                    <button type="button" name="btn-seminar" onclick="location.href='../html/gallery.html'">
                        Seminars
                    </button>
                </li>
                <li class="right">
                    <button
                        type="button"
                        name="btn-workshops"
                        onclick="location.href='../html/gallery.html'"
                    >
                        Workshops
                    </button>
                </li>
                <li class="right">
                    <button
                        type="button"
                        name="btn-event-responses"
                        onclick="location.href='./test.xml'"
                    >
                        Event Responses
                    </button>
                </li>
                <li class="right">
                    <button
                        type="button"
                        name="btn-add-event"
                        onclick="location.href='../html/add_event.html'"
                    >
                        Add Event
                    </button>
                </li>
                <li class="right">
                    <button type="button" name="btn-logout" onclick="location.href='./logout.php'">
                        Logout
                    </button>
                </li>
            </ul>
        </nav>

        <input
            type="text"
            id="searchbar"
            placeholder="Search Events"
            onkeyup="showResult(this.value)"
        />

        <div class="wr">
            <div id="livesearch"></div>
        </div>

        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("livesearch").innerHTML = this.responseText;
                        document.getElementById("livesearch").style.paddingLeft = "40px";
                        //   document.getElementById("livesearch").style.borderRadius="10px";
                    }
                };
                xmlhttp.open("GET", "livesearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

        <div class="row">
            <div class="leftcolumn">
                <?php
                //setting database info;
                $server_name = "localhost";
                $server_user = "id11302812_root";
                $server_password = "superuser";

                //add databasae name here;
                $database_name = "id11302812_campuslive";

                    $conn = mysqli_connect($server_name, $server_user, $server_password, $database_name);

                    $query = "SELECT * FROM events";

                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<br><div class='card'><h2 id='event-title'>".$row["event_name"]."</h2>";
                        echo "<h3>".$row['event_name']." ".$row['event_type']." at SFIT, ".$row['event_date']."</h3>";
                        echo "<figure><img src='{$row["image_dir"]}' class='img' /></figure>"; 
                        echo "<p><mark> Conducted by ".$row['event_org']." SFIT</mark></p>"; 
                        echo "<p style='font-family: sans-serif'>".$row['event_desc']."</p>";
                        echo "<a href='#' class='nav-links' id='client-register'><button>Register</button></a></div>";
                    } 
                ?>
                <div class="card" id="blockchain">
                    <h2 id="event-title">BlockChain</h2>
                    <h3>BlockChain workshop at SFIT, 2019-09-28</h3>
                    <figure>
                        <img src="../media/blockchain_codex.jpeg" class="img" />
                    </figure>
                    <p><mark>Conducted by CODEX SFIT</mark></p>
                    <p style="font-family: sans-serif">
                        CodeX is the student Committee of St. Francis Institute of Technology with
                        aim to To transform the students to be intellectual coders and thinkers who
                        can efficiently solve problems using state of art technology. As Blockchain
                        is the highly emerging field in today's world, CodeX is conducting hands-on
                        Blockchain workshop where the instructor is non other that the Alumini of
                        St. Francis Institute of Technology, that is Jetso from Blocklogy. He will
                        teach how to build a Fully Decentralized Blockchain Application. So join us
                        and take the utmost benefit!
                    </p>
                    <a class="nav-links" id="client-register">
                        <button onclick="location.href='https://forms.gle/ruLidkKPWUmqGcaT6'">Register</button></a>
                </div>
                <div class="card" id="machine">
                    <h2 id="event-title">
                        Machine Learning and Natural Language Processing
                    </h2>
                    <h3>Machine Learning and Natural Language Processing workshop at SFIT, 2019-09-28</h3>
                    <figure>
                        <img src="../media/ml_and_npl_ista.jpeg" class="img" />
                    </figure>
                    <p><mark>Conducted by ISTE SFIT</mark></p>
                    <p style="font-family: sans-serif">
                        I.T.S.A. stands for Indian Society For Technical Education which is a
                        students committee of St. Francis Institute of Technology. It conducts some
                        amazing workshops and Seminars on various Industry trending technical areas
                        so that students attending them get most out of it. Again Machine Learning
                        and Natural Language Processing is one of the most trending field in this
                        world of A.I. The instructor for this workshop is Mr. Surendra Mishra who is
                        Sr. Data Scientist at Eclerx Services Limited, Mumbai. It would be a great
                        experience for the students attending the workshop!
                    </p>
                    <a class="nav-links" id="client-register" >
                        <button onclick="location.href='https://forms.gle/m51FMFkVH3mPpJU89'">Register</button></a>
                </div>
                <div class="card" id="tedx">
                    <h2 id="event-title">TEDX</h2>
                    <h3>TEDX seminar at SFIT, 2019-08-25</h3>
                    <figure>
                        <img src="../media/tedx2.jpg" class="img" />
                    </figure>
                    <p><mark>Conducted by ECELL SFIT</mark></p>
                    <p style="font-family: sans-serif">
                        TEDxSFIT is the first official event of North Mumbai at St. Francis
                        Institute of Technology. The theme of "Revamp" this year, is to bring about
                        a modification in the perception of this modern century; an age that has
                        revolutionized technological innovations by leaps and bounds. This shall, in
                        turn, invigorate a spark in fecund minds and contribute towards a drastic
                        change in the society. Featuring 7 speakers from varied and diverse areas of
                        interest.So come join us on this journey of this event.
                    </p>
                    <a class="nav-links" id="client-register" >
                        <button onclick="location.href='https://forms.gle/AZrGEBtnekWbYGZS8'">Register</button></a>
                </div>
                <div class="card" id="gre">
                    <h2 id="event-title">GRE</h2>
                    <h3>GRE seminar by ITSA , Aug 7, 2019</h3>
                    <figure>
                        <img src="../media/GRE.png" class="img" />
                    </figure>
                    <p><mark>Planning for future</mark></p>
                    <p>
                        A key event, the seminar provides a platform to discuss topics like what
                        could help you achieve your dream university, tips for making a good
                        university application, the GRE exam, finance options available and visa
                        requirements. We are proud to have an eminent panelist associated with the
                        event who will be available to address any queries that you might have while
                        planning your study abroad journey. Come be a part of the event, which could
                        be your last chance to clear all your exam myths. Register now!
                    </p>
                    <a class="nav-links" id="client-register" >
                        <button onclick="location.href='https://forms.gle/kbVevZBxijSHYzFF6'">Register</button>
                    </a>
                </div>
            </div>

            <div class="rightcolumn">
                <div class="card">
                    <h2 style="padding-left: 0px;">Popular Post</h2>
                    <figcaption>Blockchain</figcaption>
                    <img
                        src="../media/blockchain_codex.jpeg"
                        style="height: 100%; width: 100%; object-fit: contain"
                    />

                    <figcaption>Machine Learning</figcaption>
                    <img
                        src="../media/ml_and_npl_ista.jpeg"
                        style="height: 100%; width: 100%; object-fit: contain"
                    />
                </div>
                <div class="card facebook">
                    <h3>Follow Us</h3>
                    <div
                        class="fb-page"
                        data-href="https://www.facebook.com/Campus-Live-107212264049079/?ref=vcp2p"
                        data-tabs="timeline"
                        data-width=""
                        data-height=""
                        data-small-header="false"
                        data-adapt-container-width="true"
                        data-hide-cover="false"
                        data-show-facepile="true"
                    >
                        <blockquote
                            cite="https://www.facebook.com/facebook"
                            class="fb-xfbml-parse-ignore"
                        >
                            <a
                                href="https://www.facebook.com/Campus-Live-107212264049079/?ref=vcp2p"
                            ></a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-distributed">
            <div class="footer-left">
                <h3>Campus<span>Live</span></h3>

                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a id="contact" href="./html/aboutus.html">About</a>
                </p>
                <div class="footer-icons">
                    <a
                        href="https://www.facebook.com/campus.live.566"
                        ><i class="fa fa-facebook"></i
                    ></a>
                    <a href="https://twitter.com/CampusLive4"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/ourcampuslive/"
                        ><i class="fa fa-instagram"></i
                    ></a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ourcampuslive@gmail.com"
                        ><i class="fa fa-google"></i
                    ></a>
                </div>
                <p class="footer-company-name">&copy; CampusLive 2019</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>SFIT, Borivali</span> Mumbai, Maharashtra</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+91 9874563210</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=jmamtora99@gmail.com"
                            >Jaineel Mamtora |
                        </a>
                        <a
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=surajchatterjee5111@gmail.com"
                            >Suraj Chatterjee |
                        </a>
                        <a
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=sandamkaran3030@gmail.com"
                            >Karan Sandam
                        </a>
                    </p>
                </div>
            </div>

            <div class="footer-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.8916665001243!2d72.85360841394171!3d19.243552586991996!2m3!1f0!2f0!3f0!3m2!111024!2i768!4f13.1!3m3!1m2!1s0x3be7b13affffffff%3A0xfd071f1d3a7844ef!2sSt.%20Francis%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1567099646712!5m2!1sen!2sin"
                    width="400"
                    height="250"
                    frameborder="0"
                    allowfullscreen=""
                ></iframe>
            </div>
        </footer>
        <script src="../js/events.js"></script>
    </body>
</html>
