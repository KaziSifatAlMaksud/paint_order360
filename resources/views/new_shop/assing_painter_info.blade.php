<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>

    <!-- Fav Icon -->
    <link rel="icon" href="images/favicon.ico" />

    <!--icon link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

   <link rel="stylesheet" href="{{ asset('css/style10.css') }}">  
    <style>

    .modal {
      display: none; 
      position: fixed; 
      z-index: 1; 
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      overflow: auto; 
      background-color: rgba(0,0,0,0.4);
      backdrop-filter: blur(5px); 
  }
  
  .modal-content {
      background-color: #fefefe;
      padding: 20px;
      border: 1px solid #888;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); 
      width: 80%; 
      max-width: 600px;
      position: relative; 
      margin: 10% auto; 
  }
  
  .close {
      color: #a00;
      margin: 15px;
      font-size: 28px;
      font-weight: bold;
      position: absolute;
      top: -10px;
      right: 0;
      border-radius: 20%;
      padding: 5px;
      cursor: pointer;
      transition: color 0.3s;
      z-index: 10;
  }
  
  
  .close:hover,
  .close:focus {
      color: black;
      text-decoration: none;
      transform: scale(1.1); 
  }
  </style>
  </head>
  <body>
 
   
 <header >
        <div class="header-row">
            <div class="header-item">
                <a href="#"> </a>
                <span> @if (!empty($company_name)) 
                    {{ $company_name }}

                @else 
                    Company Name
                @endif
                </span>
                    
                <a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
            </div>
        </div>
    </header>	

    @include('layouts.partials.footer') 
    <!-- slider -->
    <section class="nav-bar px-1 py-4">
        <div class="modal fade" id="fullscreenModal" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <img src="" class="fullscreen-image" alt="Fullscreen Image" id="fullscreenImage">
              </div>
            </div>
          </div>
        </div>
    </section>



    <section>
      <div class="custom-border card mx-3  mb-4 rounded-4" style="margin-top: 70px;">
        <div class="card-body">
          
      
          <p>This feature will send this job to a painter you chose, hey will have asses to the plans and colour sheet BUT not any purchase order you have, you can also chose if you or they buy the paint</p>
          
        </div>
      </div>
    </section>

    <!-- card -->
    <section>
      <div class="custom-border card mx-3  rounded-4">
        <div class="card-body">
          
       
          <!-- ----- Job detail------ -->
          <div id="job-content" class="content active">
            <div class="py-2 mb-2">
              <h3>110 Macksville st carnes Hill</h3>
            </div>
            <div class="d-flex gap-2 justify-content-between">
              <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/126169 1.png" style="height: 25px" />
                  <p class="mb-0">$500.00 inc gst</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/4793321 1.png" style="height: 25px" />
                  <p class="mb-0">25/may/23 (in 2 weeks)</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/meter.png" style="height: 25px" />
                  <p class="mb-0">256m2</p>
                </div>
              </div>
              <div class="d-flex flex-column align-items-center">
                <img
                class="company-logo"
                  src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                  style="height: 30px"
                />
                <p>Gate Code 4132</p>
                <p class="text-center">Supervisor : Mark peters</p>
              </div>
            </div>
            <div>
              <p>
                Render, Cladding , inside 3 coats, other painter did all the
                moroka. also the other painter finied the ceilings, you do the
                rest
              </p>
            </div>
          </div>

          <!-- ------ Assign Painter ----- -->
          <div id="paint-content" class="content">
            <div class="py-2 mb-2"><h3>Assigned painter : Job details</h5></div>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/1995396 1.png" style="height: 25px" />
                  <p class="mb-0">Magic Touch painters</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/1295109 1.png" style="height: 25px" />
                  <p class="mb-0">$200.00 inc gst</p>
                </div>
              </div>
              <div class="d-flex flex-column align-items-center">
                <img
                class="company-logo"
                  src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                  style="height: 30px"
                />
              </div>
            </div>
            <div class="pt-2">
              <p class="mb-0">This price labour only.</p>
              <p>
                Painter needs to order the paint for this job using this app
                (paint order comes to you )
              </p>
              <p class="mb-1">Extra Message:</p>
              <input type="text" class="w-100" />
            </div>
          </div>
          <!-- Profit Page -->
          <div id="page-content" class="content">
            <div class="d-flex justify-content-between py-2 mb-4">
              <h3>Cost & profit on this job</h3>
              <img
              class="company-logo"
                src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                style="height: 30px"
              />
            </div>
            <div class="fw-medium">
              <p>
                Your Price:
                <span style="color: #10be0d">original price, eg $500.00</span>
              </p>
              <p>Painter Price : <span>$200.00 this is input field</span></p>
              <p>Paint Cost : <span>$30.00</span></p>
              <p>
                Total Profit $100.00 = give % of profit from
                <span style="color: #10be0d">original price &</span>
                <span style="color: #9105ff">less Paint Cost</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- select painter job -->
    <section>
      <div class="custom-border card mx-3 mb-4 mt-4 rounded-4">
        <div class="card-body">          
          <div id="page-content" class="content active">
            <div class="d-flex justify-content-between py-2 mb-4">
              <h3>Cost & Profit on This Job</h3>
              <button type="button">ADD Painter</button> <!-- Changed from <a> to <button> for better semantic meaning -->
            </div>
            <div class="fw-medium">
              <form>
                <div class="mb-3">
                  <label for="painterOption" class="form-label">Select Painter</label>
                  <select name="painterOption" id="painterOption" class="form-select">
                    <!-- Options go here -->
                    <option value="">Select an option</option>
                    <!-- Add more <option> tags as needed -->
                  </select>
                </div>
                <div class="mb-3">
                  <label for="newPrice" class="form-label">New Price inc GST</label>
                  <input type="text" id="newPrice" name="price" class="form-control" placeholder="Enter new price">
                </div>
                <div class="mb-3">
                  <label for="extrasMessage" class="form-label">Extras Message to Painter (optional)</label>
                  <input type="text" id="extrasMessage" class="form-control" placeholder="Enter message">
                </div>
                <div class="mb-3">
                  <label class="form-label">Painter Price</label>
                  <input type="text" value="$200.00" class="form-control" readonly> <!-- Assuming this is a read-only field -->
                </div>
                <div class="mb-3">
                  <label for="paintCost" class="form-label">Paint Cost</label>
                  <input type="text" id="paintCost" value="$30.00" class="form-control" readonly>
                </div>
                <center> <button class="btn btn-primary" id="nextButton">Next</button> </center>
                <!-- Add submit button or any other elements as needed -->
              </form>
              <button class="btn btn-primary" id="clickbtn" onclick="showCostSection()">Next</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    


<!-- Cost & Profit on this job -->
    <section id="cost" class="d-none">
      <div class=" custom-border card mx-3  mb-4 mt-4 rounded-4">
        <div class="card-body">          
          <div id="page-content" class="content active">
            <div class="d-flex justify-content-between py-2 mb-4">
              <h3>Cost & profit on this job</h3>
              <img
              class="company-logo"
                src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                style="height: 30px"
              />
            </div>
            <div class="fw-medium">
              <p>
                Your Price:
                <span style="color: #10be0d">original price, eg $500.00</span>
              </p>
              <p>Painter Price : <span>$200.00 this is input field</span></p>
              <p>Paint Cost : <span>$30.00</span></p>
              <p>
                Total Profit $100.00 = give % of profit from
                <span style="color: #10be0d">original price &</span>
                <span style="color: #9105ff">less Paint Cost</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- 
 select who pays for and orders the paint -->
    <section id="sectionfirst">
      <div class="custom-border card mx-3  mb-4 mt-4 rounded-4">
         <h3 class="pt-4 px-2 text-center">Select who pays for and orders the paint</h3>
          <div id="page-content" class="content active">
            <div class="d-flex flex-column align-items-stretch px-2">
              <p class="mb-3 text-center fs-6 pt-3 text-decoration-underline">Does the Painter Buy the Paint?</p>
              <div class="mt-auto d-flex justify-content-between">
                <button class="w-25 btn btn-warning ">Yes</button>
                <button onclick="showSecondQues()"  class="w-25 btn btn-danger">No</button>
              </div>
          </div>

           <div id="quesTwo" class="d-none flex-column align-items-stretch px-2">
              <p class="mb-3 text-center fs-6 pt-5 text-decoration-underline">Does the Painter orders the paint or me ?</p>
              <div class="mt-auto d-flex justify-content-between">
                <button class="w-25 btn btn-warning">Me</button>
                <button class="w-25 btn btn-danger" onclick="showThirdQues()">Painter</button>
              </div>
            </div>

            <div id="quesThird" class="d-none flex-column align-items-stretch px-2">
              <p class="mb-3 text-center fs-6 pt-5 text-decoration-underline">Is Paint order is sent to me or paint shop ?</p>
              <div class="mt-auto d-flex justify-content-between">
                <button class="w-25 btn btn-warning">Me</button>
                <button class="w-25 btn btn-danger">Shop</button>
              </div>
            </div>

            <center style="margin-bottom: 20px;">
              <button class="btn btn-success" id="addInvoicePaidLessButton">Start</button>
            </center>
      </div>
    </section>
   
       
      </div>
    </section>

    <div id="amountNotesModal" class="modal  mt-5 pt-4">
      <div class="modal-content">
          <span class="close">&times;</span>
          
          <!-- Laravel Form Starts Here -->
           <div class="alert alert-warning">
             <p>Your Total Remaining Due: </p>
          </div>
         
          <form id="amountNotesForm" action="{{ route('invoicePayment.store') }}" method="POST">
          

               
              <div id="job-content" class="content active">
                <div class="py-2 mb-2">
                  <h3>110 Macksville st carnes Hill</h3>
                </div>
                <div class="d-flex gap-2 justify-content-between">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex align-items-center gap-2">
                      <img src="/image/icon1/126169 1.png" style="height: 25px" />
                      <p class="mb-0">$500.00 inc gst</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <img src="/image/icon1/4793321 1.png" style="height: 25px" />
                      <p class="mb-0">25/may/23 (in 2 weeks)</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <img src="/image/icon1/meter.png" style="height: 25px" />
                      <p class="mb-0">256m2</p>
                    </div>
                  </div>
                  <div class="d-flex flex-column align-items-center">
                    <img
                    class="company-logo"
                      src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                      style="height: 30px"
                    />
                    <p>Gate Code 4132</p>
                    <p class="text-center">Supervisor : Mark peters</p>
                  </div>
                </div>
                <div>
                  <p>
                    Send to Painter 
                  </p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-6 text-center">
                  <button class="btn btn-success btn-lg">Yes</button>
                </div>
                <div class="col-6 text-center">
                  <button class="btn btn-danger btn-lg">No</button>
                </div>
              </div>

          </form>
          <!-- Laravel Form Ends Here -->
      </div>

  </div>
    <div style="margin: 20px 0px 300px 0px;"></div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Initially hide the sectionfirst
      var sectionFirst = document.getElementById("sectionfirst");
    
    
      // Flag to control section visibility
      var sectionVisible = false;
    
      // Function to show the sectionfirst
      function showSectionFirst() {
        sectionFirst.style.display = "block";
        sectionVisible = true;
      }
    
      // Get the "Next" button element by its ID
      var nextButton = document.getElementById("nextButton");
    
      // Add a click event listener to the "Next" button
      nextButton.addEventListener("click", function () {
        if (!sectionVisible) {
          showSectionFirst();
        }
      });
    });
    </script>
    
  
 
  <script>

    var modal = document.getElementById("amountNotesModal");
    var btn = document.getElementById("addInvoicePaidLessButton");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
    modal.style.display = "block";
    }

    span.onclick = function() {
    modal.style.display = "none";
    }

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }   

    // new 
    function showCostSection() {
    document.getElementById("cost").classList.remove("d-none");
  }
    function showSecondQues() {
    var quesTwo = document.getElementById("quesTwo");
    quesTwo.classList.remove("d-none");
    quesTwo.classList.add("d-flex");
  }
    function showThirdQues() {
    var quesThird = document.getElementById("quesThird");
    quesThird.classList.remove("d-none");
    quesThird.classList.add("d-flex");
  }




</script>



  </body>
</html>
