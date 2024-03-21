@extends('tampilan.apputama')
@section('title', 'Membuat Data Testimoni')
@section('subtitle', 'Halaman Membuat Testimoni Baru')
    
@section('content')

<section class="content">
<style>
  .rate {
      float: left;
      height: 46px;
      padding: 0 10px;
      }
      .rate:not(:checked) > input {
      position:absolute;
      display: none;
      }
      .rate:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ccc;
      }
      .rated:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ccc;
      }
      .rate:not(:checked) > label:before {
      content: '★ ';
      }
      .rate > input:checked ~ label {
      color: #ffc700;
      }
      .rate:not(:checked) > label:hover,
      .rate:not(:checked) > label:hover ~ label {
      color: #deb217;
      }
      .rate > input:checked + label:hover,
      .rate > input:checked + label:hover ~ label,
      .rate > input:checked ~ label:hover,
      .rate > input:checked ~ label:hover ~ label,
      .rate > label:hover ~ input:checked ~ label {
      color: #c59b08;
      }
      .star-rating-complete{
         color: #c59b08;
      }
      .rating-container .form-control:hover, .rating-container .form-control:focus{
      background: #fff;
      border: 1px solid #ced4da;
      }
      .rating-container textarea:focus, .rating-container input:focus {
      color: #000;
      }

      .rated {
      float: left;
      height: 46px;
      padding: 0 10px;
      }
      .rated:not(:checked) > input {
      position:absolute;
      display: none;
      }
      .rated:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ffc700;
      }
      .rated:not(:checked) > label:before {
      content: '★ ';
      }
      .rated > input:checked ~ label {
      color: #ffc700;
      }
      .rated:not(:checked) > label:hover,
      .rated:not(:checked) > label:hover ~ label {
      color: #deb217;
      }
      .rated > input:checked + label:hover,
      .rated > input:checked + label:hover ~ label,
      .rated > input:checked ~ label:hover,
      .rated > input:checked ~ label:hover ~ label,
      .rated > label:hover ~ input:checked ~ label {
      color: #c59b08;
      }
</style>  
<div class="container">
   <div class="row">
      <div class="col mt-4">
         <form class="py-2 px-4" action="{{ route('testimoni.update', $testimoni->id )}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
            @method("PUT")
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
                  <textarea class="form-control" name="testimoni" rows="6 " placeholder="Comment" maxlength="200">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
               </div>
            </div>
            <div class="mt-3 text-right">
               <button class="btn btn-sm py-2 px-3 btn-info">Submit
               </button>
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