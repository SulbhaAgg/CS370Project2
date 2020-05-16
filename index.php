<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="likeHome">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="about/css/date.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s002">
      <form>
        <fieldset>
          <legend>Input Date</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field third-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
              </svg>
            </div>
            <input class="datepicker" id="return" type="text" placeholder="05 May 2020" />
          </div>
        
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="button" name = "submit" >Submit</button>
          </div>
        </div>
      </form>
    </div>
    <script src="about/js/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {});

    </script>
    
  </body>
</html>
