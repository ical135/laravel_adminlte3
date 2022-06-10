<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>{{ ucwords(Request::segment(1)) }}</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            @php 
            if ( count(Request::segments()) > 1 ):
                for ($i=1; $i <= count(Request::segments())-1 ; $i++) : 
                    echo '<li class="breadcrumb-item">'. ucwords( str_replace('_', ' ', Request::segment($i)) ) .'</li>';
                endfor;
            endif;
            @endphp
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
