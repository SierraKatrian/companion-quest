<?php

session_start();
include "header2.php";
$userArray = $_SESSION['user'];

$userFirstName = $userArray['f_name'];
$userLastName = $userArray['l_name'];

?>

<head>
	<title>Game Room</title>
    <link rel="stylesheet" href="css/main-portal.css">
    <script src="js/main-portal.js"></script>
</head>

<body>
    
    <main class="content-wrapper">
    
            <div class="container-fluid">
                <div class="welcome row">
                    <br />
                    <h1>Game Room</h1>
                    <p>
                        Welcome to the Game Room <?echo $userFirstName?>! Here you can create or join a game. You can
                        request to join current games, view pending requests or invites and 
                        search for available games. Enjoy your quest!
                    </p>
                </div><!--END of welcome row-->
                <div class="create-current row">
                    <h2>Start A Quest!</h2><br />
                    
                    <!-- CREATE A GAME SECTION -->
                    
                    <div class="list-group col-md-12">
                      <div class="list-group-item active"><h3>CREATE A GAME</h3></div>
                          <div class="jumbotron jumbotron-creategame col-md-12">
                            <div class="create-game-text col-md-6">
                                <h2>Be A Games Master!</h2> 
                                <p>Set your own rules and click here to start your very own Companion Quest!</p>
                                <a  href="create-a-game.php"><button type="button" class="btn btn-primary">Create Quest!&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a>
                            </div>
                            <div class="col-md-6">
                                <img class="companionquest-banner-2" src="img/global/companionQuestBanner.png" alt="Companion Quest Banner" />
                            </div>
                          </div>
                    </div>
                    
                    <!-- CURRENT GAMES SECTION -->
                    
                    <div class="list-group col-md-12">
                      <div class="list-group-item active"><h3>CURRENT GAMES</h3></div>
                        <div class="list-group-item">
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Status</th>
                                    <th>Game Name</th>
                                    <th>Games Master</th>
                                    <th>Language</th>
                                    <th>Players</th>
                                    <th>Theme</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                        <a href="#" data-toggle="tooltip" title="access granted">
                                            <img class="access-colours" src="img/status-colours/access-granted.svg" alt="access granted" />
                                        </a>
                                    </td>
                                    <td>tonys_bronys</td>
                                    <td>tony1000</td>
                                    <td>EN</td>
                                    <td>6</td>
                                    <td>Apocalypse World</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <a href="#" data-toggle="tooltip" title="access granted">
                                            <img class="access-colours" src="img/status-colours/access-granted.svg" alt="access granted" />
                                        </a>                                    
                                    </td>
                                    <td>ultimate_quest321</td>
                                    <td>jonny_quest</td>
                                    <td>FR</td>
                                    <td>7</td>
                                    <td>Apocalypse World</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <a href="#" data-toggle="tooltip" title="access granted">
                                            <img class="access-colours" src="img/status-colours/access-granted.svg" alt="access granted" />
                                        </a>                                    
                                    </td>
                                    <td>dungeon_pals412</td>
                                    <td>grand_master_flash</td>
                                    <td>DE</td>
                                    <td>10</td>
                                    <td>Dungeon World</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div><!--END of list-group-item-->
                    </div><!--END of list-group-->
                </div><!--END of create-current row-->
            </div><!--END of container-->
        
            <!-- GAME STATUS SECTION -->
            <br />
            <div class="list-group col-md-12">
                <div class="list-group-item active"><h3>Game Status</h3></div>
                    <div class="access-dot-index content-wrapper" data-spy="affix" data-offset-top="1040">
                        <div class="col-md-2"><img class="access-colours" src="img/status-colours/access-granted.svg" alt="access granted" /><span class="access-colours-text">&nbsp;access granted</span></div>
                        <div class="col-md-2"><img class="access-colours" src="img/status-colours/access-denied.svg" alt="access granted" /><span class="access-colours-text">&nbsp;access denied</span></div>
                        <div class="col-md-2"><img class="access-colours" src="img/status-colours/request-pending.svg" alt="access granted" /><span class="access-colours-text">&nbsp;pending request...</span></div>
                        <div class="col-md-2"><img class="access-colours" src="img/status-colours/invite-pending.svg" alt="access granted" /><span class="access-colours-text">&nbsp;pending invite...</span></div>
                        <div class="col-md-2"><img class="access-colours" src="img/status-colours/access-searching.svg" alt="access granted" /><span class="access-colours-text">&nbsp;game open</span></div>
                        <div class="col-md-2"><span class="glyphicon glyphicon-lock"></span><span class="access-colours-text">&nbsp;game locked</span></div>
                    </div>
                <div class="bottom"></div>
            </div>
           
        <!-- JOIN A QUEST SECTION -->
        <div class="container-fluid">
            <div class="create-current row">
                <h2>Join A Quest!</h2>
                <br />
            <div class="list-group col-md-12">
              <div class="list-group-item active"><h3>Requests / Invites</h3></div>
                <div class="list-group-item">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Status</th>
                            <th>Game Name</th>
                            <th>Games Master</th>
                            <th>Language</th>
                            <th>Players</th>
                            <th>Theme</th>
                          </tr>
                        </thead>
                        <tbody>
                        <a href="player-portal.php">
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="access denied">
                                    <img class="access-colours" src="img/status-colours/access-denied.svg" alt="access denied" />
                                </a>
                            </td>
                            <td>THE_BEST_GAME_EVER111</td>
                            <td>mandy1000</td>
                            <td>EN</td>
                            <td>15</td>
                            <td>Apocalypse World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="pending request...">
                                    <img class="access-colours" src="img/status-colours/request-pending.svg" alt="pending request" />
                                </a>                                    
                            </td>
                            <td>harmon_fans</td>
                            <td>Dan_Dan_Dan</td>
                            <td>EN</td>
                            <td>20</td>
                            <td>Dungeon World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="pending request...">
                                    <img class="access-colours" src="img/status-colours/request-pending.svg" alt="pending request" />
                                </a>                                    
                            </td>
                            <td>powerpuffs</td>
                            <td>jenny_K</td>
                            <td>EN</td>
                            <td>3</td>
                            <td>Dungeon World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="pending invite...">
                                    <img class="access-colours" src="img/status-colours/invite-pending.svg" alt="pending invite" />
                                </a>                                    
                            </td>
                            <td>powerfulpals</td>
                            <td>erin_the_roach</td>
                            <td>EN</td>
                            <td>1</td>
                            <td>Apocalypse World</td>
                          </tr> 
                        </a>
                        </tbody>
                      </table>
                    </div><!--END of list-group-item-->
                </div><!--END of list-group-->             
            </div><!-- END of create-current row -->
        </div><!-- END of container-fluid -->
        
        <!-- JOIN A QUEST SECTION -->
        <div class="container-fluid">
            <div class="create-current row">
                <h2>Find A Quest!</h2>
                <br />
                
                <div class="find-quest row">
                    <form action="" method="get" name="advanced-search">
                        <div class="gameNameDIV form-group col-md-3">
                            <label for="gameName">Game Name:</label>
                            <input type="text" class="gameName form-control" name="gameName" />
                        </div>
                        <div class="themeNameDIV form-group col-md-3">
                            <label for="gametheme">Theme Preference:</label><br />
                            <select name="gametheme">
                                <option value="chooseTheme">-- Choose A Theme --</option>
                                <option value="Apocalypse World">Apocalypse World</option>
                                <option value="Dungeon World">Dungeon World</option>
                            </select>
                        </div>
                        <div class="gameLanguageDIV form-group col-md-3">
                            <label for="gamelanguage">Language:</label><br />
                            <select name="gamelanguage">
                                <option value="chooseLanguage">-- Choose A Language --</option>
                                <option value="english">English</option>
                                <option value="french">French</option>
                                <option value="spanish">Spanish</option>
                                <option value="french">Mandarin</option>
                                <option value="french">Arabic</option>
                                <option value="french">Portuguese</option>
                                <option value="french">Hindi</option>
                                <option value="french">Russian</option>
                                <option value="french">Japanese</option>
                                <option value="french">Korean</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary search-btn col-md-2">Search!&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </div>
                
            <div class="list-group col-md-12">
              <div class="list-group-item active"><h3>Current Games</h3></div>
                <div class="list-group-item">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Status</th>
                            <th>Game Name</th>
                            <th>Games Master</th>
                            <th>Language</th>
                            <th>Players</th>
                            <th>Theme</th>
                          </tr>
                        </thead>
                        <tbody>
                        <a href="player-portal.php">
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="access locked">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </a>
                            </td>
                            <td>game123</td>
                            <td>Bertie4000</td>
                            <td>EN</td>
                            <td>10</td>
                            <td>Apocalypse World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="access locked">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </a>                                    
                            </td>
                            <td>game_fans</td>
                            <td>Beatrice05</td>
                            <td>EN</td>
                            <td>20</td>
                            <td>Dungeon World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="game open">
                                    <img class="access-colours" src="img/status-colours/access-searching.svg" alt="game open" />
                                </a>                                    
                            </td>
                            <td>questers</td>
                            <td>rey_valentine</td>
                            <td>EN</td>
                            <td>3</td>
                            <td>Dungeon World</td>
                          </tr>
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="game locked">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </a>                                    
                            </td>
                            <td>powerfulpals</td>
                            <td>erin_the_roach</td>
                            <td>EN</td>
                            <td>1</td>
                            <td>Apocalypse World</td>
                          </tr> 
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="game open">
                                    <img class="access-colours" src="img/status-colours/access-searching.svg" alt="game open" />
                                </a>                                    
                            </td>
                            <td>blerp_blerp</td>
                            <td>sierra_K</td>
                            <td>EN</td>
                            <td>5</td>
                            <td>Dungeon World</td>
                          </tr>  
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="game open">
                                    <img class="access-colours" src="img/status-colours/access-searching.svg" alt="game open" />
                                </a>                                   
                            </td>
                            <td>batman</td>
                            <td>i_am_batman</td>
                            <td>EN</td>
                            <td>1</td>
                            <td>Apocalypse World</td>
                          </tr> 
                          <tr>
                            <td>
                                <a href="#" data-toggle="tooltip" title="game open">
                                    <img class="access-colours" src="img/status-colours/access-searching.svg" alt="game open" />
                                </a>                                    
                            </td>
                            <td>bill_and_ted</td>
                            <td>keanu</td>
                            <td>EN</td>
                            <td>5</td>
                            <td>Dungeon World</td>
                          </tr>
                        </a>
                        </tbody>
                      </table>
                    </div><!--END of list-group-item-->
                </div><!--END of list-group-->             
            </div><!-- END of create-current row -->
        </div><!-- END of container-fluid -->            
   
    </main><!-- END of content-fluid-->

<?php include "footer.php"; ?>