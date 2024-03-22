@extends('tampilan.apputama')
@section('title', 'Membuat Data Testimoni')
@section('subtitle', 'Halaman Membuat Testimoni Baru')
    
@section('content')

<section class="content">
<div class="container">
   <div class="row">
      <div class="col mt-4">
         <form class="py-2 px-4" action="{{action('App\Http\Controllers\DashboardTestimoniController@store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
            @csrf
            <p class="font-weight-bold ">Review</p>
            <div class="form-group row">
               <div class="col">
                  <div class="rate">
                     <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                     <label for="star5" title="Istimewa">5 stars</label>
                     <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                     <label for="star4" title="Sempurna">4 stars</label>
                     <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                     <label for="star3" title="Sangat Baik">3 stars</label>
                     <input type="radio" id="star2" class="rate" name="rating" value="2">
                     <label for="star2" title="Baik">2 stars</label>
                     <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                     <label for="star1" title="Cukup">1 star</label>
                  </div>
               </div>
            </div>
            <div class="form-group row mt-4">
               <div class="col">
                  <textarea class="form-control" name="testimoni" rows="6 " placeholder="Comment" maxlength="200"></textarea>
               </div>
            </div>
            <div class="mt-3 text-right">
               <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
</section>
@endsection

@section('javascript')
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
@endsection