  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Form Elements</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Elements</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">Basic Elements</h4>
        <div class="row">
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Basic Input</label>
              <input class="form-control" id="basicInput" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Input text with help</label>
              <small class="text-muted">eg.<i>someone@example.com</i></small>
              <input class="form-control" id="helpInputTop" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Disabled Input</label>
              <input class="form-control" id="disabledInput" disabled="" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Readonly Input</label>
              <input class="form-control" id="readonlyInput" readonly value="You can't update me :P" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Input with Placeholder</label>
              <input class="form-control" id="placeholderInput" placeholder="Enter Email Address" type="email">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Static Text</label>
              <p class="form-control-static m-bot-1" id="staticInput">email@pixinvent.com</p>
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Rounded Input</label>
              <input id="roundText" class="form-control round" placeholder="Rounded Input" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Square Input</label>
              <input id="squareText" class="form-control square" placeholder="square Input" type="text">
            </fieldset>
          </div>
          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>With Helper Text</label>
              <input id="helperText" class="form-control" placeholder="Name" type="text">
              <p> <small class="text-muted">Find helper text here for given textbox.</small> </p>
            </fieldset>
          </div>
        </div>
        <hr class="m-t-3 m-b-3">
        <h4 class="text-black">File Input</h4>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputFile">Simple File Input</label>
              <input type="file" id="exampleInputFile">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <fieldset class="form-group">
                <label for="file">With Browse button</label>
                <label class="custom-file center-block block">
                  <input type="file" id="file" class="custom-file-input">
                  <span class="custom-file-control"></span> </label>
              </fieldset>
            </div>
          </div>
        </div>
      
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>