<?php include 'php/includes/header.inc.php'; ?>

    <title>HOME|PureNotes</title>
    <!-- textarea plugin -->
    <script src="js/jquery.flexibleArea.js"></script>

    <script src="js/home.js"></script>
    <script src="js/home-notes.js"></script>
    <script src="js/typedNotes.js"></script>
    <script src="js/delete-tab.js"></script>
    <link rel="stylesheet" href="css/home.css">

<?php include 'php/includes/nav.inc.php'; ?>

<div class="wrapper">

  <div class="side-nav">
      <div class="retract" id="retract">
        <p>Organized Notes</p>
      </div>
      <div class="createNew">
        <h3>Create New Tab</h3>
        <img src="images/plus.png" alt="addsign" id="createNew">
      </div>

      <div class="tab-section">
          <h2 class="h2-notabs">No Tabs Created Yet</h2>
      </div>
    </div>



<div class="container">
  <div class="tabContent">
    <h2 class="h2-nonotes">No Notes Created Yet<span>(Click one of your tabs)</span></h2>
  </div>
<br>
<br>
  <div class="holder">
    <h3>Start Typing</h3>
    <div class="delete">
        <button id="deleteBtn">Delete a Tab</button>
      <button type="button" id="delnote">Delete Current Note</button>
    </div>
  </div>

  <form id="paper" class="paper">
    <h6 id="timestamp"></h6>
    <textarea placeholder="Enter Something"
    id="text" class="text" name="text"></textarea>
    <br>
  </form>
    <div class="withCheck">
      <button type="button" id="scrollTop">^ Back to top ^</button>
      <button type="button" id="save">save</button>

          <img src="images/check.png" id="check">
  </div>

<!-- mini footer -->
  <div class="footer">
    <div class="rightF">
      <p>©Von Denuelle L. Tandoc</p>
      <p>&nbsp;  Jade Lester Dela Cruz</p>
      <p>&nbsp;  Royce D. Ogot</p>
    </div>
    <div class="leftF">
      <a href="/purenotes/">Home</a>
      <a href="/purenotes/about">About</a>
      <a href="/purenotes/contact">Contact Us</a>
      <a href="/purenotes/php/includes/logout.inc.php">Logout</a>
    </div>
  </div>
</div>



</div><!-- end div wrapper -->


<!-- popup when creates new tab -->
  <div class="modal" id="modal">
      <button id="close-button">&times;</button>
      <div class="modal-header">
<!-- creating -->
        <div class="creating">
        <div class="title">Enter Tab Name:</div>
        <br>
        <input type="text" id="title-modal" maxlength="30">
        <h6>Maximum 30 Characters</h6>
        <p id="error"></p>

        <button id="createBtn">Create Tab</button>
        <button id="createNoteBtn">Create Note</button>
        </div>
        <!-- delete -->
        <div class="deleteshow">
          <h4>Choose a Tab in the dropdown to delete:</h4>

          <div class="tabdelete">
            <h5>*Deleting a tab will erase all of its notes</h5>
            <center>
            <div class="dropdown">
                <button class="dropbtn">Tab Lists</button>
                <div class="dropdown-content">
                </div>
                <p></p>
              </div>
            </center>
          </div>
        </div>
<!-- delete note -->
        <div class="deletenote">
          <h3>Are you sure you want to delete current note?</h3>
          <button type="button" class="delnote" id="delnoteC">Delete Current Note</button>
        </div>

      </div>
  </div>

    <div id="overlay"></div>
  </body>
  </html>
