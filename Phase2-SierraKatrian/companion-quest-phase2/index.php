<?php

require_once 'view/header1.php';

?>
<main>
    <div class="jumbotron">
        <div class="content-wrapper container-fluid">
            <div class="row">
                <div class="companionquest-banner col-sm-6 col-sm-push-6">
                <img class="" src="img/global/companionQuestBanner.png" alt="Companion Quest Banner" />
                </div>
                <div class="jumbotron-text col-sm-6 col-sm-pull-6">
                    <h1>From Tabletop To Desktop!</h1>
                    <p>Designed to bring people together and enhance the way we play tabletop roleplaying games.</p>
                    <div class="btn-group register-btn" data-toggle="modal" data-target="#RegisterModal">
                      <button type="button" class="large-btn btn btn-primary">Register</button>
                    </div>
                    <div class="btn-group signin-btn" data-toggle="modal" data-target="#SignInModal">
                      <button type="button" class="large-btn btn btn-primary">Sign In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OUR GAMES -->
<div class="content-wrapper container-fluid">


    <div class="row body-content">
        <div class="col-md-12">
            <h2>Our Games</h2>
        </div>
    </div>

    <div class="row body-content">

        <!-- Apocalypse World Section -->

        <div class="col-sm-6">
            <img class="apocalypse-world-img" src="img/home/apocalypse-world-thumb.jpg" alt="Apocalypse World Thumb" />
            <h3>Nobody remembers how or why.</h3>
            <p>
                The oldest living survivors have childhood memories of it: cities burning,
                society in chaos then collapse, families set to panicked flight, the weird
                nights when the smoldering sky made midnight into a blood-colored half-day.
            </p>
            <p>
                Now the world is not what it was. Look around you: evidently, certainly,
                not what it was. But also close your eyes, open your brain: something
                is wrong.
            </p>

            <!-- Apocalypse World Rulebook Modal -->

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ApocalypseModal"><span class="glyphicon glyphicon-file"></span> view rulebook</button>

            <div id="ApocalypseModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Apocalypse World Rulebook<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button></h3>
                        </div><!--END of modal-header-->
                        <div class="modal-body">
                            <object width="100%" height="500" data="files/Apocalypse-World-Rulebook.pdf"></object>
                        </div>
                    </div>
                </div>
            </div><!-- END of Apocalypse World Rulebook Modal -->
        </div>

        <!-- Dungeon World Section -->

        <div class="col-sm-6">
            <img class="dungeon-world-img" src="img/home/dungeon-world-thumb.jpg" alt="Dungeon World Thumb" />
            <h3>Classic fantasy adventure. </h3>
            <p>
                Explore a land of magic and danger in the roles of adventurers searching for
                fame, gold, and glory. Delve into goblin holes or chance a dragon's lair.
                Dungeon World takes classic fantasy and approaches it with new rules.
            </p>
            <p>
                Dungeon World's simple rules happen based on what's happening within the game,
                so you spend more time talking about the action and less time talking about the
                rules.
            </p>

            <!-- Dungeon World Rulebook Modal -->

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span> view rulebook</button>

            <div id="DungeonModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Dungeon World Rulebook<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button></h3>
                        </div>
                        <div class="modal-body">
                            <object width="100%" height="500" data="files/Dungeon-World-Rulebook.pdf"></object>
                        </div>
                    </div>
                </div>
            </div> <!-- END of Dungeon World Rulebook Modal -->
        </div>

    </div> <!-- END of OUR GAMES -->

    <!-- OUR STORY -->
        <div class="row body-content">
            <div class="col-md-12">
                <h2>Our Story</h2>
            </div>
        </div>

        <div class="row body-content">
            <div class="col-md-12">
                <h3>Code Companions</h3>
                <p>
                    The Code Companions team first joined forces at Humber College. There we were provided with
                    the task of creating an interactive website. In an effort to create something that was both
                    different and more in line with our own interests, we decided to combine our knowlege of
                    technology with tabletop roleplay gaming. Our personal goal was to create a platform that
                    fosters inclusivity and embraces the diversity within the community.
                </p>
                <p>
                    We used our different levels of tabletop knowledge in order to determine what would be easy
                    to understand for players of all experience levels. This platform will take away some of
                    the stresses of being an inexperienced player. How do we know? Because some of our team
                    members played their first game during the early planning stages of this very site.
                </p>

                <h3>Who are we?</h3>
                <p>
                    We are an ambitious and excited bunch of students who have not had much exposure to the sunlight
                    this past year so we hope that you enjoy the site as much as we do. Armed with our keyboards, we
                    bring you tabletop roleplay gaming like never before.
                </p>
            </div>
        </div>
    </div>
</main>

<?php

require_once 'view/footer.php';

?>
