@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order By Year Report</h4>
                    </div>

                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">


<form method="post" action="{{ route('search-by-user')}}">
       @csrf
       <div class="col">
           <div class="card">

               <div class="card-body">
                   <h5 class="card-title">Search By User</h5>


     <label class="form-label">Select User:</label>
       <select name="user" class="form-select mb-3" aria-label="Default select example">
       <option selected="">Open this select User</option>
       @foreach($users as $user)
       <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
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
</div>
</div>
</div>
</section>

@endsection                   