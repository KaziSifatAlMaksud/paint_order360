<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>360 Painting</title>

    <!-- Fav Icon -->
    <link rel="icon" href="images/favicon.ico" />
s
    <!--icon link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/style8.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    
    
  </head>

  <body>

  <header>
			<div class="header-row">
				<div class="header-item">
				 <a href="<?php echo '/invoice' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Report </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
	</header>

    @include('layouts.partials.footer') 
    
    <main class="vh-100 position-relative" style="margin-top:90px;">
     

      <!-- card -->
      <section class="mt-4">
        <div class="card mx-1 shadow rounded-4">
          <div class="card-body">
            <div
              class="cart-btn d-flex align-items-center justify-content-between toggle-card"
              style="height: 60px"
            >
              <div class="d-flex flex-column align-items-center" id="job">
                <img src="/image/icon1/calendar.png" alt="calendar.png" />
                <p>Yearly Page</p>
              </div>
              <div
                class="painter-btn d-flex flex-column align-items-center"
                id="paint"
              >
                <img src="/image/icon1/calendar.png" alt="calendar.png" />
                <p>Quarterly Page</p>
              </div>
              <div class="d-flex flex-column align-items-center" id="page">
                <img src="/image/icon1/graph.png" alt="job.png" />
                <p>Per job page</p>
              </div>
            </div>
            <!-- ----- yearly------ -->
            <div id="job-content" class="yearly-page content active">
              <h6 class="text-center mt-4">
                Yearly report of Profit and costs from 1st jan
              </h6>
              <p class="px-4 mb-1 fw-bold">Income by customer</p>
              <div class="customers-income px-4 mb-4">
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Mac jones homes</p>
                  <p class="cus-income">$<span>107.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">jones homes</p>
                  <p class="cus-income">$<span>540.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Sunny</p>
                  <p class="cus-income">$<span>780.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Mac jones homes</p>
                  <p class="cus-income">$<span>170.00</span></p>
                </div>
              </div>

              <div class="total-income px-4 d-flex justify-content-between">
                <p class="cus-name fw-bold mb-0">Total income</p>
                <p class="cus-income mb-0">$<span>170.00</span></p>
              </div>
              <p class="date px-4 mb-4">1st jan to today yearly</p>

              <div class="px-3 shadow my-4"><hr /></div>

              <div class="total-expense">
                <p class="px-4 mb-1 fw-bold">Total expense and profit</p>
                <div class="px-4 mb-4">
                  <div class="d-flex w-100">
                    <p class="cost">Total Income</p>
                    <p class="t-income">$<span>107.00</span></p>
                  </div>
                  <div class="d-flex w-100">
                    <p class="cost">Paint Cost</p>
                    <p class="">$<span>540.00</span></p>
                  </div>
                  <div class="d-flex w-100">
                    <p class="cost">Labour Costs</p>
                    <p class="">$<span>780.00</span></p>
                  </div>
                  <div class="d-flex w-100">
                    <p class="cost">Total Costs</p>
                    <p class="">$<span>170.00</span></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- ------ Quarterly ----- -->
            <div id="paint-content" class="content Quarterly">
              <h6 class="text-center mt-4">
                Yearly report of Profit and costs from 1st jan
              </h6>
              <p class="mb-1 fw-bold">Income by customer</p>
              <div class="customers-income mb-4">
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Mac jones homes</p>
                  <p class="cus-income">$<span>107.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">jones homes</p>
                  <p class="cus-income">$<span>540.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Sunny</p>
                  <p class="cus-income">$<span>780.00</span></p>
                </div>
                <div class="single-customer d-flex justify-content-between">
                  <p class="cus-name">Mac jones homes</p>
                  <p class="cus-income">$<span>170.00</span></p>
                </div>
              </div>

              <div class="total-income d-flex justify-content-between">
                <p class="cus-name fw-bold mb-0">Total income</p>
                <p class="cus-income mb-0">$<span>170.00</span></p>
              </div>
              <div class="my-4"><hr /></div>
            </div>

            <!-- per job Page -->
            <div id="page-content" class="content">
              <div
                class="cart-btn d-flex align-items-center justify-content-between toggle-type"
                style="height: 60px"
              >
                <h6>Cost & Profit</h6>
                <div id="price" class="active" onclick="toggleTab('price')">
                  <h6>Price $</h6>
                </div>
                <div id="percentage" onclick="toggleTab('percentage')">
                  <h6>Percentage %</h6>
                </div>
              </div>

              <div id="price-content" class="content-type active">
                <table class="price-content-table" style="width:100%">
                  <tr>
                    <th style="width:50%">Job</th>
                    <th>Job Price</th>
                    <th>Paint</th>
                    <th>Labour</th>
                    <th>Profit</th>
                  </tr>
                  <tbody id="dataBody"></tbody>
                </table>
                
                <div class="mx-auto pt-4">
                  <table style="width:100%">
                    <tr>
                      <th style="width:50%">Total</th>
                      <th>Job Price</th>
                      <th>Paint</th>
                      <th>Labour</th>
                      <th>Profit</th>
                    </tr>
                    <tr>
                      <th style="width:40%">40 houses</th>
                      <th>$500</th>
                      <th>$700</th>
                      <th>$400</th>
                      <th>$500</th>
                    </tr>
                  </table>
                </div>
              </div>
              <div id="percentage-content" class="content-type">
                <table class="price-content-table" style="width:100%">
                  <tr>
                    <th style="width:50%">Job</th>
                    <th>Job Price</th>
                    <th>Paint</th>
                    <th>Labour</th>
                    <th>Profit</th>
                  </tr>
                  <tbody id="percentageBody"></tbody>
                </table>
                
                <div class="mx-auto pt-4">
                  <table style="width:100%">
                    <tr>
                      <th style="width:50%">Total</th>
                      <th>Job Price</th>
                      <th>Paint</th>
                      <th>Labour</th>
                      <th>Profit</th>
                    </tr>
                    <tr>
                      <th style="width:40%">40 houses</th>
                      <th>50%</th>
                      <th>70%</th>
                      <th>40%</th>
                      <th>50%</th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- footer nav -->
    </main>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  
  </body>
</html>