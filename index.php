<?php

    include "View/Header.php";

?>


<!--BANNER-->

    <div class="jumbotron home-banner">

        <!--ALERT MESSAGE (currently hidden)
        <div class="alert alert-success alert-dismissible">
            <div class="wrapper">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
                <strong>Success!</strong> <?php echo "hello" ?>
            </div>
        </div>-->

        <div class="container-fluid wrapper">
            <div class="row red">

                <div class="col-md-6 col-md-push-6 banner-content">
                    <img class="banner-image green" src="./Images/companionquest-banner.png" alt="Companion Quest Banner"/>
                </div>

                <div class="col-md-6 col-md-pull-6 banner-content-text banner-content green">
                    <h1>From Tabletop To Desktop!</h1>
                    <p>Designed to bring people together and enhance the way we play tabletop roleplaying games.</p>
                    <div class="register-signin-btns">
                        <?= $showRegisterSigninBtns; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


<!--OUR GAMES-->

    <div class="wrapper green">
        <h2 class="padding-10px">Our Games</h2>
    </div>

    <div class="row wrapper green">

        <!--APOCALYPSE WORLD-->

        <div class="col-md-6 red apocalypseworld-content">

            <img class="full-width" src="./Images/apocalypse-world-thumb.jpg" alt="Apocalypse World Image"/>
            <h3>Nobody remembers how or why.</h3>
            <p>
                The oldest living survivors have childhood memories of it: cities burning, society in chaos then
                collapse, families set to panicked flight, the weird nights when the smoldering sky made midnight into
                a blood-colored half-day.
            </p>
            <p>
                Now the world is not what it was. Look around you: evidently, certainly, not what it was. But also close
                your eyes, open your brain: something is wrong.
            </p>
            <br/>

            <!--RULEBOOK MODAL-->

            <button type="button" class="margin-10px btn btn-info btn-lg" data-toggle="modal" data-target="#ApocalypseModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
            <?php include "View/Modals/rulebook-apocalypseworld.php" ?>

        </div>


        <div class="col-md-6 green">
            <img class="full-width" src="./Images/dungeon-world-thumb.jpg" alt="Dungeon World Image"/>
            <h3>Classic fantasy adventure. </h3>
            <p>
                Explore a land of magic and danger in the roles of adventurers searching for fame, gold, and glory.
                Delve into goblin holes or chance a dragon's lair. Dungeon World takes classic fantasy and approaches it
                with new rules.
            </p>
            <p>
                Dungeon World's simple rules happen based on what's happening within the game, so you spend more time on
                the action and less time on the rules.
            </p>
            <br/>

            <!--RULEBOOK MODAL-->

            <button type="button" class="margin-10px btn btn-info btn-lg" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
            <?php include "View/Modals/rulebook-dungeonworld.php" ?>

        </div>

    </div><!--end of row-->


    <div class="padding-10px horizontal-line "></div>
    <div class="gap-10px"></div>


<!--OUR STORY-->

    <div class="padding-10px our-story-content">
        <div class="wrapper green">
            <div class="gap-10px"></div>
            <h2>Our Story</h2>
        </div>

        <div class="row wrapper green">

                <h3>Code Companions</h3>
                <p>
                    The Code Companions team first joined forces at Humber College. There we were provided with the task of
                    creating an interactive website. In an effort to create something that was both different and more in
                    line with our own interests, we decided to combine our knowlege of technology with tabletop roleplay
                    gaming. Our personal goal was to create a platform that fosters inclusivity and embraces the diversity
                    within the community.
                </p>
                <p>
                    We used our different levels of tabletop knowledge in order to determine what would be easy to
                    understand for players of all experience levels. This platform will take away some of the stresses of
                    being an inexperienced player. How do we know? Because some of our team members played their first game
                    during the early planning stages of this very site.
                </p>

                <h3>Who Are We?</h3>
                <p>
                    We are an ambitious and excited bunch of students who have not had much exposure to the sunlight this
                    past year so we hope that you enjoy the site as much as we do. Armed with our keyboards, we bring you
                    tabletop roleplay gaming like never before.
                </p>

        </div>

    </div>

<?php include "View/Footer.php"?>


