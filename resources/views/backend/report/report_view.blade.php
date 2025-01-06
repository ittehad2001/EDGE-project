@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ecommerce Report</h4>
                    </div>
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">

                    <form method="post" action="{{ route('search-by-date')}}">
		@csrf

    <div class="col">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Search By Date</h5>
                 <label class="form-label">Date:</label>
    <input type="date" name="date" class="form-control">
    <br>
    <input type="submit" class="btn btn-rounded btn-primary" value="Search">
            </div>


        </div>
    </div>
</form>



  <form method="post" action="{{ route('search-by-month')}}">
		@csrf
    <div class="col">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Search By Month</h5>
                 <label class="form-label">Select Month:</label>
    <select name="month" class="form-select mb-3" aria-label="Default select example">
    <option selected="">Open this select Month</option>
    <option value="Janurary">Janurary</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="Jun">Jun</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
</select>

  <label class="form-label">Select Year:</label>
    <select name="year_name" class="form-select mb-3" aria-label="Default select example">
    <option selected="">Open this select Year</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
</select>


    <br>
    <input type="submit" class="btn btn-rounded btn-primary" value="Search">
            </div>


        </div>
    </div>
</form>


<form method="post" action="{{ route('search-by-year')}}">
@csrf
    <div class="col">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Search By Year</h5>


  <label class="form-label">Select Year:</label>
    <select name="year" class="form-select mb-3" aria-label="Default select example">
    <option selected="">Open this select Year</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
</select>


    <br>
    <input type="submit" class="btn btn-rounded btn-primary" value="Search">
            </div>


        </div>
    </div>
</form>



            </div> 


        </div>


                    </div>



                    
</div>
        </div>
    </div>
</section>

@endsection