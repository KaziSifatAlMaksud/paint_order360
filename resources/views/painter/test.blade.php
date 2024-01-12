<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Card Example</title>
    
    <style>
     @import url('https://fonts.googleapis.com/css?family=poppins:100,200,300,400,500,600,700,800,900');*

body {
  background-color: #f0f0f0;
}

.card {
  border: 3px solid #afafaf;
  border-radius: 10px;
  width: 95%;
  height: 150px;
  background-color: #fff;
  margin: auto;
}

.card-wrapper {
  border: 1px solid #ccc; /* assumed 1px as you had missed the numeric value */
  border-radius: 10px;
  height: 100%;
  overflow: hidden;
  background-color: #f0f0f0;
}

.card-content {
  display: flex;
  height: 100%;
}

.card-text {
  padding: 20px;
  width: 60%;
  font-size: 25px;
  background-color: #fff;
}

.card-image {
  width: 35%;
  background-color: #ffffff;
  padding: 5px;
}

.card-text h3 {
  font-size: 60px;
  margin: 0;
  color: black;
  text-decoration: none;
}

.card-text p {
  font-size: 50px;
  margin: 10px 0 0;
}

.card-image {
  display: flex;
  justify-content: center;  /* Centers content along the horizontal line */
  align-items: center;  /* Centers content along the vertical line */
}

.card-image img {
  width: 60%;             /* size of image */
  height: 60%;
  object-fit: cover;
}

.card:hover {
  cursor: pointer;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Media query for screens smaller than 600px */


@media screen and (max-width: 600px) {
  .card {
    width: 100%;
  }
  .card-text {
    font-size: 18px;
  }
  .card-text h3 {
    font-size: 22px;
  }
  .card-text p {
    font-size: 18px;
  }
}
      
    </style>

</head>
<body>
    <div>
   
    <div class="card">
        <a href="photo_order.blade.php">
            <div class="card-wrapper">  
          <div class="card-content">
            <div class="card-text">
              <h3>Look at New Jobs</h3>
              <br>
              <p>See new job posted by all your builders.</p>
            </div>
            <div class="card-image">
              <img src="/image/Capture.PNG" alt="Card Image">
              
              
            </div>
          </div>
         </div>
        </a>
      </div>
      <br>
      <div class="card">
        <a href="index.html">
            <div class="card-wrapper">
          <div class="card-content">
            <div class="card-text">
              <h3>Previous Jobs </h3>
              <br>
              <p>See all the jobs for builders that are finished.</p>
            </div>
            <div class="card-image">
              <img src="images/purchase.png" alt="Card Image">
            </div>
          </div>
          </div>
        </a>
      </div>
      <br>
      <div class="card">
        <a href="#">
            <div class="card-wrapper">
          <div class="card-content">
            <div class="card-text">
              <h3>Scheduling </h3>
              <br>
              <p>See all jobs for builders booked in this week.</p>
            </div>
            <div class="card-image">
              <img src="images/sched.png" alt="Card Image">
            </div>
            </div>
          </div>
        </a>
      </div>

    </div>