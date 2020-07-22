@extends('author.layouts.app')
@section('title', 'New Submission')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
<style type="text/css">
  /* Style the form */
  #regForm {
    min-width: 300px;
  }
  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }
  /* Hide all steps by default: */
  .tab {
    display: none;
  }
  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }
  /* Mark the active step: */
  .step.active {
    opacity: 1;
  }
  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }

  /*----------------------------------*/
  .board {
    width: 100%;
    height: auto;
    background: none;
  }

  .board .nav-tabs {
    position: relative;
    margin-bottom: 0;
    box-sizing: border-box;
  }

  .liner {
    height: 2px;
    background: #ddd;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
  }

  .nav-tabs>li {
    width: 33.33%;
  }

  .nav-tabs>li:after {
    content: " ";
    position: absolute;
    opacity: 0;
    margin: 0;
    margin-left: -10px;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #008000;
    transition: left 1s;
  }

  .nav-tabs>li.active:after {
    left: 50%;
    opacity: 1;
  }

  .nav-tabs>li[rel-index="-1"]:after {
    left: calc(50% + 100%);
  }

  .nav-tabs>li[rel-index="-2"]:after {
    left: calc(50% + 200%);
  }

  .nav-tabs>li[rel-index="-3"]:after {
    left: calc(50% + 300%);
  }

  .nav-tabs>li[rel-index="1"]:after {
    left: calc(50% - 100%);
  }

  .nav-tabs>li[rel-index="2"]:after {
    left: calc(50% - 200%);
  }

  .nav-tabs>li[rel-index="3"]:after {
    left: calc(50% - 300%);
  }

  .nav-tabs>li a {
    width: 150px;
    height: 50px;
    line-height: 50px;
    margin: 20px auto;
    padding: 0;
    border: none;
    background: none;
  }

  .nav-tabs>li a:hover {
    border: none;
    background: none;
  }

  .nav-tabs>li.active a,
  .nav-tabs>li.active a:hover {
    border: none;
    background: none;
  }

  .nav-tabs>li span {
    width: 150px;
    height: 50px;
    display: inline-block;
    background: white;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
  }

  .nav-tabs>li:nth-of-type(1) span {
    color: green;
    border: 2px solid green;
    box-shadow: 1px 1px 10px 1px;
  }

  .nav-tabs>li:nth-of-type(1).active span {
    color: green;
    background: #fff;
  }

  .nav-tabs>li:nth-of-type(2) span {
    color: green;
    border: 2px solid green;
    box-shadow: 1px 1px 10px 1px;
  }

  .nav-tabs>li:nth-of-type(2).active span {
    color: green;
    background: #fff;
  }

  .nav-tabs>li:nth-of-type(3) span {
    color: green;
    border: 2px solid green;
    box-shadow: 1px 1px 10px 1px;
  }


  .nav-tabs>li:nth-of-type(3).active span {
    color: green;
    background: #fff;
  }

  .nav-tabs>li:nth-of-type(4) span {
    color: green;
    border: 2px solid green;
  }

  .nav-tabs>li:nth-of-type(4).active span {
    color: green;
    background: #fff;
  }

  .nav-tabs>li>a.disabled {
    opacity: 1;
  }

  .nav-tabs>li>a.disabled span {
    border-color: #ddd;
    color: #aaa;
  }

  div[role="tabpanel"]:after {
    content: "";
    display: block;
    clear: both;
  }
</style>
@endpush

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12" style="padding: 0px;">
      <div class="panel panel-default">
      <div class="box">
        <div class="box-body well">
          <div class="col-md-12 show_submit_condition_div"
          style="margin-top: 10px; ;padding: 5px 50px;background-color: #fff !important; _border: 1px solid #5b735f !important;">
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">Please Make Sure Fillup
            All ( <span style="color: red">*</span> ) mark field.</h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">Please follow Our paper
            format.</span> (<a href="/paper_template.docx">Paper Template .doc</a>)</h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">pdf and (.doc/.docx)
            both File of your paper are Required During Submition</span>.</h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">Needed your paper has
            accurate 11 (times new roman) font and single line spacing</span>.</h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">Write your Reference
              (Times new roman 10 font) correctly According to our Instructions or follow APA
            format for Reference</span>.</h4>
            <h4 class="" style="margin-top: 10px;">N.B : </h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">The status of the
                paper will show accepted and you have to click on "pay now" Button. After that
              payment page will open</span> .</h4>
            <h4><i class="fa fa-hand-o-right"></i> <span style="color: #ff9800;">You can use your
              Author's Account to Submit multiple article</span>.</h4>
            <div class="row">
              <div class="col-md-12 text-center">
                <bottom id="show_submit_form_btn" class="btn btn-primary btn-sm" >I Read Continue</bottom>
              </div>
            </div>
          </div>

          <form class="show_submit_form_div" onsubmit="return validateSubmitForm()"
          action="{{route('author.paper-submission.store')}}" id="regForm" method="post"
          enctype="multipart/form-data" style="border: 0px solid #e3e3e3 !important; display: none;">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="box-body">
            <div class="">
              <div class="">
                <div class="board">
                  <ul class="nav nav-tabs" style="z-index: 0;">
                    <div class="liner"></div>
                    <li rel-index="0" class="active">
                      <a href="#step-1" id="#step_1_btn" class="btn" aria-controls="step-1" role="tab"
                      data-toggle="tab">
                      <span> Step 1</span>
                    </a>
                  </li>
                  <li rel-index="1">
                    <a href="#step-2" class="btn disabled" aria-controls="step-2"
                    role="tab" data-toggle="tab">
                    <span> Step 2</span>
                  </a>
                </li>
                <li rel-index="2">
                  <a href="#step-3" class="btn disabled" aria-controls="step-3"
                  role="tab" data-toggle="tab">
                  <span> Step 3 </span>
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="step-1">
              <div class="col-md-12">
                <div class="">
                  <div class="">
                    <input id="issue_id" name="issue_id" class="form-control"
                    value="{{ $submissiontimer->id }}" type="hidden">
                    <input id="journal_id" name="journal_id"
                    class="form-control" value="{{ $category->id }}"
                    type="hidden">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Manuscript/Paper Type
                          <span style="color: red">*</span></label>
                          <select class="selectpicker form-control"
                          name="type_id">
                          <option value="1">Research Article</option>
                          <option value="2">Review Article</option>
                          <option value="3">Abstract Article</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="control-label">Research Area<span
                          style="color: red">*</span></label>
                          <input id="aresearch" _maxlength="120"
                          name="aresearch" placeholder="Area of Research"
                          class="form-control" value="" type="text">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Paper Title<span
                            style="color: red">*</span></label>
                            <input id="ptitle" name="ptitle"
                            placeholder="Manuscript/Paper Title"
                            class="form-control" type="text">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="">
                            <label class="control-label">Abstract (Maximum 250
                              Words)<span style="color: red">*</span></label>
                              <textarea id="abstract" name="abstract"
                              maxlength="1500" rows="7"
                              style="-webkit-box-sizing:border-box;-moz-box-sizing: border-box;box-sizing: border-box;width: 100%;"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <a id="step-1-next" class="btn btn-sm btn-primary nextBtn pull-right">Next</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="step-2">
                    <div class="col-md-12">
                      <div class="">
                        <div class="col-md-12 form-group">
                          <label class="control-label"
                          style="border-bottom: 1px solid #d2d6de; width: 100%;">Author
                        Name</label>
                        <div class="row form-group" id="author_name_add">
                          <div class="col-md-4">
                            <label class="control-label">Name of Author 1
                              (Minimum 1 Author Required)<span
                              style="color: red">*</span></label>
                              <input id="author_name1" name="author_name[]"
                              placeholder="Author Name 1" class="form-control"
                              value="" type="text">
                            </div>
                            <div class="col-md-4">
                              <label class="control-label">Name of Author
                              2</label>
                              <input name="author_name[]"
                              placeholder="Author Name 2" class="form-control"
                              value="" type="text">
                            </div>

                            <div class="col-md-4">
                              <label class="control-label">Name of Author
                              3</label>
                              <input name="author_name[]"
                              placeholder="Author Name 3" class="form-control"
                              value="" type="text">
                            </div>
                          </div>
                          <a class="btn btn-default" onclick="add_new_author()">Add More Field</a>
                        </div>

                        <div class="col-md-12 form-group">
                          <label class="control-label"
                          style="border-bottom: 1px solid #d2d6de; width: 100%;">Manuscript
                        Information</label>
                        <div class="row">
                          <div class="col-md-4">
                            <label class="control-label">Number of Figures</label>
                            <input id="no_figures" name="no_figures"
                            placeholder="Number of Figures" class="form-control"
                            value="0" type="number">
                          </div>

                          <div class="col-md-4">
                            <label class="control-label">Number of Tables</label>
                            <input id="no_tables" name="no_tables"
                            placeholder="Number of Tables" class="form-control"
                            value="0" type="number">
                          </div>

                          <div class="col-md-4">
                            <label class="control-label">Number of Words</label>
                            <input id="no_words" name="no_words"
                            placeholder="Number of Words" class="form-control"
                            value="0" type="number">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <a id="step-2-next" class="btn btn-sm btn-primary nextBtn pull-right ">Next</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="step-3">
                  <div class="col-md-12">
                    <div class="">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Doc File(Only .doc
                                and .docx file allowed) <span
                                style="color: red">*</span></label>
                                <div class="">
                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <img src="{{ asset('images/docx.png')}}"
                                      alt="" style="height:100px;">
                                    </span>
                                    <input id="docx" name="docx"
                                    onchange="docx_validation(event)"
                                    class="form-control" type="file"
                                    style="z-index: 0; padding: 40px 0px 72px 15px;">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label">Only PDF File Allow
                                  (<span class="text-danger">Be confirm! You
                                  can't change it next time</span>) <span
                                  style="color: red">*</span></label>
                                  <div class="">
                                    <div class="input-group">
                                      <span class="input-group-addon">
                                        <img src="{{ asset('images/pdf.png')}}"
                                        alt="" style="height:100px;">
                                      </span>
                                      <input id="pdf" name="pdf"
                                      onchange="pdf_validation(event)"
                                      class="form-control" type="file"
                                      style="z-index: 0; padding: 40px 0px 72px 15px;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Keywords(Minimum 1 and maximum 5 Keywords Required)
                              <span style="color: red">*</span></label>
                              <div class="" style="margin-bottom: 20px;">
                                <div id="all_tags" style="background-color: #fff; min-height: 75px; margin-bottom: 10px; padding: 5px 0px;">
                              </div>
                              <div class="">
                                <div class="_col-md-4 _col-md-offset-5">
                                  <select id="select_Keywords"
                                  class="form-control select2 select2-hidden-accessible"
                                  onclick="_select_this_checkbox(this)"
                                  style="width: 100%;" tabindex="-1"
                                  aria-hidden="true">
                                  <option>Add Keywords</option>
                                </select>
                              </div>
                            </div>
                            <textarea id="all_ids" name="paper_tags"
                            style="display:none;"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Confirmation the
                            Following</label>
                            <div class="checkbox">
                              <label>
                                <input id="terms_and_condition" name="terms_and_condition" value="1" type="checkbox">
                                I have read the <a href="{{route('terms_condition')}}"  target="_blank">Terms & Condition</a> and
                                Accept<span style="color: red"> *</span>
                                <span style="color: red" id="terms_and_condition_checked" class="hidden">Please Checked This checkbox</span>
                              </label>
                            </div>

                            <div class="checkbox">
                              <label>
                                <input id="agreement" name="agreement" value="1" type="checkbox">I have read the 
                                I have read the <a href="{{route('privacy_policy')}}" target="_blank">Privacy Policy</a> and Accept <span style="color: red">*</span> 
                                <span id="agreement_checked" class="hidden" style="color: red">Please Checked This checkbox</span>
                              </label>
                            </div>
                          </div>
                          <div class="">
                            <button id="paper_submit_btn" type="submit" class="btn btn-md btn-primary nextBtn pull-right">Submmit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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

@endsection

@push('scripts')
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.js')}}"></script>

<script>
  function add_new_author() {
    var count = $('#author_name_add .col-md-4').length + 1;
    var html = '';
    html += '<div class="col-md-4">'
    html += '<label class="control-label">Name of Author ' + count + '</label>'
    html += '<input  name="author_name[]" placeholder="Author Name ' + count +
    '" class="form-control" value="" type="text">'
    html += ' </div>'
    $('#author_name_add').append(html);
  }
</script>

<script>
  $("#show_submit_form_btn").click(function() {
    $('.show_submit_form_div').slideDown();
    $('.show_submit_condition_div').hide();
    $('#show_submit_form_btn').hide();
    $("#show_submit_condition_btn").show();
  });

  $("#show_submit_condition_btn").click(function() {
    $('.show_submit_condition_div').slideToggle();
  });


// ======================== Validation Start ================================
$(document).ready(function() {
  $("#aresearch").keyup(function() {
    if ($(this).val() != "") {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#ptitle").keyup(function() {
    if ($(this).val() != "") {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#abstract").keyup(function() {
    if ($(this).val() != "") {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#author_name1").keyup(function() {
    if ($(this).val() != "") {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#docx").change(function() {
    if ($('#docx').prop('files').length == 1) {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#pdf").change(function() {
    if ($('#pdf').prop('files').length == 1) {
      $(this).css({
        "border-color": "green",
        "border-width": "1px",
        "border-style": "solid"
      });
    } else {
      $(this).css({
        "border-color": "red",
        "border-width": "1px",
        "border-style": "solid"
      });
    }
  });
  $("#terms_and_condition").change(function() {
    if ($("#terms_and_condition").prop("checked") == false) {
      $("#terms_and_condition_checked").removeClass('hidden');
    } else {
      $("#terms_and_condition_checked").addClass('hidden');
    }
  });
  $("#agreement").change(function() {
    if ($("#agreement").prop("checked") == false) {
      $("#agreement_checked").removeClass('hidden');
    } else {
      $("#agreement_checked").addClass('hidden');
    }
  });
});

function validateSubmitForm() {
  if ($('#aresearch').val() == "") {
    $("#aresearch").focus();
    $("#aresearch").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 1 <span style='color:red; font-weight:bold;'> Research Area </span> <br/>Field is Required</h4>");
    return false;

  } else if ($('#ptitle').val() == "") {

    $("#ptitle").focus();
    $("#ptitle").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 1 <span style='color:red; font-weight:bold;'> Paper Title </span><br/> Field is Required </h4>");
    return false;

  } else if ($('#abstract').val() == "") {

    $("#abstract").focus();
    $("#abstract").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 1 <span style='color:red; font-weight:bold;'> Abstract </span> <br/>Field is Required </h4>");
    return false;

  } else if ($('#author_name1').val() == "") {

    $("#author_name1").focus();
    $("#author_name1").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 2 <span style='color:red; font-weight:bold;'> Author </span> <br/>Field is Required </h4>");
    return false;

  } else if ($('#docx').val() == "") {

    $("#docx").focus();
    $("#docx").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 3 <span style='color:red; font-weight:bold;'> Docx </span> <br/> Field is Required </h4>");
    return false;

  } else if ($('#pdf').val() == "") {

    $("#pdf").focus();
    $("#pdf").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    Swal.fire("<h4>In Step 3 <span style='color:red; font-weight:bold;'> PDF </span> <br/> Field is Required </h4>");
    return false;

  } else if ($('#all_ids').val() == "" || $('#all_ids').val() == '[]') {

    $(".select2-selection--single").focus();
    $(".select2-selection--single").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    return false;

  } else if ($("#terms_and_condition").prop("checked") == false) {

    $("#terms_and_condition").focus();
    $("#terms_and_condition_checked").removeClass('hidden');
    return false;

  } else if ($("#agreement").prop("checked") == false) {

    $("#agreement").focus();
    $("#agreement_checked").removeClass('hidden');
    return false;

  } else if ($('#all_ids').val() == "") {

    var error = '<span style="color: red">Keywords(Minimum 1 and maximum 5 Keywords Required) !</span>'
    Swal.fire(error);
    $(".select2-selection--single").focus();
    $(".select2-selection--single").css({
      "border-color": "red",
      "border-width": "1px",
      "border-style": "solid"
    });
    return false;

  } else {

    show_loader_div('Paper is Uploading. Please Wait..')
    return true;
  }
}

function docx_validation(event) {
  if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
    return;
  }
  const docx_name = event.target.files[0].name;
  const docx_lastDot = docx_name.lastIndexOf('.');
  const docx_ext = docx_name.substring(docx_lastDot + 1);
  if (docx_ext == 'docx' || docx_ext == 'doc') {
    console.log(docx_ext);
  } else {
    $('#docx').val('')
    var error = '<span style="color: red">Only ( .docx or .doc ) format are Allowed !</span>'
    Swal.fire(error);
  }
}

function pdf_validation(event) {
  if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
    return;
  }
  const pdf_name = event.target.files[0].name;
  const pdf_lastDot = pdf_name.lastIndexOf('.');
  const pdf_ext = pdf_name.substring(pdf_lastDot + 1);
  if (pdf_ext == 'pdf' || pdf_ext == 'PDF') {
    console.log(pdf_ext);
  } else {
    $('#pdf').val('')
    var error = '<span style="color: red">Only ( .pdf ) format is Allowed !</span>'
    Swal.fire(error);
  }
}
// =========================== Validation End ================================

$(function() {
  //Initialize Select2 Elements
  $('.select2').select2()
})

$("#funding_yes").click(function() {
  $("#funder_div").show();
});

$("#funding_no").click(function() {
  $("#funder_div").hide();
});
</script>

<script type="text/javascript">
  var checkbox_arr = [];
  $('#select_Keywords').change(function() {
    var all_ids = $('#all_ids').html();
    var tag = this.value
    if (all_ids.indexOf(tag) == -1) {
      if (checkbox_arr.length < 5) {
        checkbox_arr.push(tag);
        var apend = '<span class="tag_' + this.value +
        '" style="font-size: 16px;font-weight: 500;color: #4d7941; margin-left:5px;     margin-right: 10px;position: relative" class=""><span style="background-color: #3c8dbc;border-color: #367fa9;padding: 1px 10px;color: #fff;">' +
        this.value +
        '</span><sup class="" style="color: #463e3e;font-size: 20px;cursor: pointer;position: absolute;top: -5px;right: -5px;background-color: #afafaf;padding: 6px 1px; border-radius: 4px;" onclick="remove_tag(\'' +
        this.value + '\')">×</sup></span>'
        $("#all_tags").append(apend);
      } else {
        var error = '<span style="color: red">Maximum 5 Keywords are Allowed !!</span>'
        Swal.fire(error);
      }
    }
    var arr = JSON.stringify(checkbox_arr);
    $('#all_ids').html(arr);
  });

  function add_new_tag() {
    var new_tag = $('.select2-search__field').val()
    var all_ids = $('#all_ids').html();
    if (all_ids.indexOf(new_tag) == -1)
      if (checkbox_arr.length < 5) {
        checkbox_arr.push(new_tag);
        var apend = '<span class="tag_' + new_tag +
        '" style="font-size: 16px;font-weight: 500;color: #4d7941; margin-left:5px;     margin-right: 10px; position: relative" class=""><span style="background-color: #3c8dbc;border-color: #367fa9;padding: 1px 10px;color: #fff;">' +
        new_tag +
        '</span><sup class="" style="color: #463e3e;font-size: 20px;cursor: pointer;position: absolute;top: -5px;right: -5px;background-color: #afafaf;padding: 6px 1px; border-radius: 4px;" onclick="remove_tag(\'' +
        new_tag + '\')">×</sup></span>'
        $("#all_tags").append(apend);
        $('#add_new_tag').val('');
      } else {
        var error = '<span style="color: red">Maximum 5 Keywords are Allowed !!</span>'
        Swal.fire(error);
      }
      var arr = JSON.stringify(checkbox_arr);
      $('#all_ids').html(arr);
      $('.select2-search__field').val('')
  }

  function remove_tag(me) {
    var all_ids = $('#all_ids').html();
    var arr = JSON.parse(all_ids);

    var index = arr.indexOf(me);
    if (index != -1) {
      arr.splice(index, 1);
    }

    checkbox_arr = arr
    var arr = JSON.stringify(arr);
    $('#all_ids').html(arr);
    $(".tag_" + me).remove();
    console.log($('#all_ids').html())
    if ($('#all_ids').html() == '[]') {
      checkbox_arr = []
      arr = [];
      $('#all_ids').html('');
      var error = '<span style="color: red">Minimum 1 Keywords Required !!</span>'
      Swal.fire(error);
    }
    console.log(checkbox_arr);
  }

  var currentTab = 0;
  showTab(currentTab);
</script>

<script type="text/javascript">
  $(function() {
    // Nav Tab stuff
    $('.nav-tabs > li > a').click(function() {
      if ($(this).hasClass('disabled')) {
        return false;
      } else {
        var linkIndex = $(this).parent().index() - 1;
        $('.nav-tabs > li').each(function(index, item) {
          $(item).attr('rel-index', index - linkIndex);
        });
      }
    });
    $('#step-1-next').click(function() {
      // Check values here
      var isValid = true;
      if (isValid) {
        $('.nav-tabs > li:nth-of-type(2) > a').removeClass('disabled').click();
      }
    });
    $('#step-2-next').click(function() {
      // Check values here
      var isValid = true;
      if (isValid) {
        $('.nav-tabs > li:nth-of-type(3) > a').removeClass('disabled').click();
      }
    });
    $('#step-3-next').click(function() {
      // Check values here
      var isValid = true;
      if (isValid) {
        $('.nav-tabs > li:nth-of-type(4) > a').removeClass('disabled').click();
      }
    });
  });
</script>
@endpush