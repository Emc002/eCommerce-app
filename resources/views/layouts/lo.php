<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,100,0,0" />  
    <script src="https://cdn.tiny.cloud/1/b6x1ccciy1whz33r2n3th674gvtih51i3vfd7ztzy8qt4vmv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
      
@import url('https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap');

        body {
          /* background-color: #f2f2f2f2; */
          background: url('http://localhost:8000/images/bg1.png');
          background-repeat: no-repeat;
          background-size:auto;
          font-family: 'Bakbak One', cursive;
          color: #fff !important;
        }

        .dataTables_wrapper .dataTables_length select {
    border: 1px solid rgb(255, 255, 255);
    border-radius: 3px;
    padding: 5px;
    background-color: #3769ab !important;
    padding: 4px;
}
        .worder{
         position:absolute;
         top: 16rem;
         left: 17rem;
         font-size: 3rem !important;
        }

        .lookImg{
          filter: brightness(50%)
        }
        .position{
          display: flex;
          justify-content: space-between;
        }
        .position1{
          display: flex;
          gap: 2rem
        }
    
        .navBar{
          background-color: #61bff100;
          border-radius: 1rem;
          margin: 1rem 3rem !important;
          padding-left: 1rem;
          padding-right: 1rem;
          font-size: 1.5rem
        }

        .navbar-brand {
          color: #fff !important;
          font-size: 1.5rem

        }
        .nav-link {
          color: #fff !important;
        }
        .table{
          color: #fff !important;
          font-size: 1.2rem 
        }

        .tableDesgin{
          margin-top: 1.3rem;
        }
    
        .boxCategory {
          background-color: #b8dcf0;
          height: auto;
          padding: 1rem 2rem 1rem 2rem;
          box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
          border-radius: 1rem;
          margin: 3rem 30rem;
          padding: 3rem 3rem;
        }
        ::-webkit-scrollbar {
          width: 12px;
        }
    
        ::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px rgba(200, 200, 200, 1);
          border-radius: 10px;
        }
    
        ::-webkit-scrollbar-thumb {
          border-radius: 10px;
          background-color: #fff;
          -webkit-box-shadow: inset 0 0 6px rgba(90, 90, 90, 0.7);
        }

      .box {
      background-color: #04294b;
      height: auto;
      padding: 1rem 2rem 1rem 2rem;
      box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
      border-radius: 1rem;
      margin: 3rem 30rem;
      padding: 3rem 3rem;
    }
    .box1 {
      background-color: #04294b;
      height: auto;
      padding: 1rem 2rem 1rem 2rem;
      box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
      border-radius: 1rem;
      padding: 3rem 3rem;
    }

    .myButton {
	       -webkit-backdrop-filter: blur(10px) !important;
	      backdrop-filter: blur(70px) !important;
	      background: rgba(78, 163, 237, 0.7);
	      border-radius:1px !important;
	      border:1px solid #efefef !important;
	      display:inline-block !important;
	      cursor:pointer !important;
	      color:#ffffff !important;
	      font-size:17px !important;
	      padding:8px 38px !important;
	      text-decoration:none !important;
	      text-shadow:0px 1px 0px #2f6627 !important;
        position: absolute;
        top: 23rem;
        left: 45rem;
}

.myButton1 {
	       -webkit-backdrop-filter: blur(10px) !important;
	      backdrop-filter: blur(70px) !important;
	      background: rgba(78, 163, 237, 0.7);
	      border-radius:1px !important;
	      border:1px solid #efefef !important;
	      display:inline-block !important;
	      cursor:pointer !important;
	      color:#ffffff !important;
	      font-size:17px !important;
	      padding:8px 38px !important;
	      text-decoration:none !important;
	      text-shadow:0px 1px 0px #2f6627 !important;
        position: absolute;
        top: 23rem;
        left: 43rem;
}
.myButton:hover {
  -webkit-backdrop-filter: blur(10px) !important;
	      backdrop-filter: blur(70px) !important;
	      background: rgba(255, 255, 255, .7);
}

      </style>
</head>
<body id="app-layout">
@include("layouts.navbar")
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>