<div class="container-fluid dash-cat">

    <div class="row">

        <div class="col-lg-3 ">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active cat-active" aria-current="true">
                    Dashboard
                </a>
                <a href="{{ route('my_courses',['id'=> session()->get('loggedID') ]) }}" class="list-group-item list-group-item-action"><i class="fab fa-discourse"></i> My Cycles</a>
                <a href="{{ route('my_books') }}" class="list-group-item list-group-item-action"><i class="fas fa-book-reader"></i> My Books</a>

                <!-- <a href="{{ route('my_payments') }}" class="list-group-item list-group-item-action"><i class="fab fa-cc-visa"></i> My Payments</a> -->
                <a href="{{ route('my_accepted_requests') }}" class="list-group-item list-group-item-action"><i class="fab fa-cc-visa"></i> Accepted Payments</a>
                <a href="{{ route('my_accepted_requests') }}" class="list-group-item list-group-item-action"><i class="fas fa-exclamation-circle"></i></i> Late Submissions</a>

            </div>
        </div>
        <div class="col-lg-3" >
            <div class="card text-white bg-danger mb-3 dash-card" style="max-width: 18rem;">
                <div class="card-header"><i class="fab fa-discourse"></i> Courses</div>
                    <div class="card-body">
                        <h5 class="card-title"><span class="card-h-sp">{{ count(Auth::user()->all_cycles) }}</span> Cycles</h5>
                        <p class="card-text">You Have These Courses.</p>
                    </div>
            </div>
        </div>
        <div class="col-lg-3" >
            <div class="card text-white bg-success mb-3 dash-card" style="max-width: 18rem;">
                <div class="card-header"><i class="fas fa-book-reader"></i> library</div>
                    <div class="card-body">
                        <h5 class="card-title"><span class="card-h-sp">{{ count(Auth::user()->books) }}</span> Books</h5>
                        <p class="card-text">You Have These Books.</p>
                    </div>
            </div>
        </div>
        <div class="col-lg-3" >
            <div class="card text-white bg-dark mb-3 dash-card" style="max-width: 18rem;">
                <div class="card-header"><i class="fab fa-cc-visa"></i>Accepted Payment</div>
                    <div class="card-body">
                        <!-- <h5 class="card-title"><span class="card-h-sp">{{ count( Auth::user()->cycles_payment ) }}</span> Invoices</h5> -->
                        <h5 class="card-title"><span class="card-h-sp">{{ count( $accepted_requests ) }}</span> Invoices</h5>
                        <p class="card-text">You Have These Invoices.</p>
                    </div>
            </div>
        </div>
    </div>
</div>
