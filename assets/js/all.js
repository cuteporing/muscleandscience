$(document).ready(function() {

	var activeLink = (function (){
		var getLink = {
			basePath    : '/muscleandscience/',
			page        : document.URL.split(location.host)[1],

			init: function(){
				this.getActiveLink();
				this.activeAccordionLink();
			},

			//ADD CLASS ACTIVE TO TOP NAVIGATION LINK
			//----------------------------------------
			getActiveLink: function(){
				this.page = this.delLinkParameters(this.page);
				this.page = this.page.split(this.basePath)[1];

				(this.page=="")?
				  $('.top-bar-section a[href="index.php"]').addClass('active')
				: $('.top-bar-section a[href="'+this.page+'"]').addClass('active');
			},

			//REMOVES ALL PARAMETERS FROM LINK
			//----------------------------------------
			delLinkParameters: function(link){
				var oldURL = link,
					newURL = oldURL,
					index  = 0;

				index = oldURL.indexOf('?');

				if(index == -1) index = oldURL.indexOf('#');
				if(index != -1) newURL = oldURL.substring(0, index);
				else newURL = oldURL;

				return newURL;
			},

			//ACTIVATE FIRST-CHILD OF ACCORDION
			//----------------------------------------
			activeAccordionLink: function(){
				$('.accordion dd:first-child').addClass("active");
				$('.accordion dd:first-child .content').slideToggle('fast').addClass("active");
			}
		}
		return getLink.init();
	})();

	/* ---------------------------------------------------
	 * ACCORDION FUNCTIONS
	 * -------------------------------------------------*/
	function showSideNavigation(){
		$('.page-right-account').toggle("blind");
	}

	//Accordion Smooth effect
	//----------------------------------------
	$(".accordion").on("click", "dd:not(.active)",
		Foundation.utils.debounce(function (e) {
			$(this).parent().find("dd.active").removeClass('active').find(".content").slideToggle("fast");
			$(this).addClass('active').find(".content").slideToggle("fast");
	}, 300, true));

	//Accordion click function for Gym Classes
	//----------------------------------------
	$('.ui-state-default').click(function() {
		var id     = $(this).find("a").attr("href");
		var target = id;
		$(this).addClass('ui-tabs-selected').siblings().removeClass('ui-tabs-selected');
		$(id).removeClass("ui-tabs-hide").siblings('div').addClass("ui-tabs-hide");
		scrollPage($(target));
	});

	// $('.open-navi, .close-navi').on('click',
	// 	Foundation.utils.debounce(function (e){
	// 	showSideNavigation();
	// }, 300, true));

	//----------------------------------------
	//Featured banner
	//Before and after banner change 
	//----------------------------------------
	// $("#banner").on("before-slide-change.fndtn.orbit", function(event) {
	// 	$('.orbit-caption').fadeOut(100);
	// });
	// $("#banner").on("after-slide-change.fndtn.orbit", function(event, orbit) {
	// 	$('.orbit-caption').fadeIn(500);
	// });

	/* ---------------------------------------------------
	 * FUNCTION FOR SMOOTH SCROLLING
	 * -------------------------------------------------*/
	function scrollPage(x){	
		if(x.length > 0){
			$('html, body').stop().animate({ scrollTop: x.offset().top - 15 }, 500);	
		}
	}
});

/*//---------------------------------------
//GALLERY
//---------------------------------------
$('.open-details').click(function() {
	var id = $(this).attr("href");
	id = id.split("#")[1];
	
	carousel_gallery_desc();	//slidedown of gallery description w/ smooth scrolling
});

$('.close').click(function() {
	$('.gallery-item-details-list').slideUp(400);
});

function carousel_gallery_desc() {
	var target = $('.gallery-item-details-list');
	target.slideDown(500);
	scrollPage(target);
}

/



function backTop(){
  jQuery('html, body').animate({scrollTop: 0}, 500);
  return false; 
}




//refined search checkbox
//change search input[type=search] to input[type=date] if query needs
//a date input
$(".search-opt-date").change(function(){
	var txt = $('.search-opt-text');
	var s = $('#search_input');
	var opt_id = $(this).attr("id");

	//change text of refined search drop down button
	replace_ref_ind(opt_id);
	
		//if checked
		if($('.search-opt-date:checked').length > 0){
			$(this).siblings(".search-opt-date").prop("checked", false);
			txt.attr("disabled", "disabled");	
			txt.prop("checked", false);

			if($(this).attr("id")=="chkbx_dmonth" || $(this).attr("id")=="chkbx_bday"){
				gen_month(s);
			}else if($(this).attr("id")=="chkbx_dyear"){
				gen_year(s);
			}else{
				
				gen_input(s, 'date', 'mm/dd/yyyy');
			}															
		}else{
			replace_ref_ind("name");		
			txt.removeAttr("disabled");	
			txt.prop("checked", true);	

			if($(this).val("s-slct")){
				s.replaceWith('<input class="disb" type="search"  id="search_input" name="search_input" placeholder="">');
			}else{
				s.prop('type', 'search');
			}
			
		}
	
});


//---------------------------------------
//Refined search drop down button
//---------------------------------------
function replace_ref_ind(opt_id){	
	if(opt_id=="name"){
		$("#ref_btn").text('Search by: NAME');
	}else{
		var lbl_id = $("label[for='" + opt_id+ "']").html().toUpperCase();  
		$("#ref_btn").text('Search by: ' +  lbl_id); 
	}	
}

//---------------------------------------
//generate input[type]
//---------------------------------------
function gen_input(s, t, p){
	s.replaceWith('<input class="disb" type="'+t+'"  id="search_input" name="search_input" value="" placeholder="'+p+'">');
}

//---------------------------------------
//generate year <select>
//---------------------------------------
function gen_year(s){
	var currentYear = (new Date).getFullYear();
	var yearStart;
	s.replaceWith('<select class="disb" id="search_input" name="search_input" placeholder="" value="s-slct"></select>');
			for(yearStart = 2014; yearStart<=currentYear;yearStart++){
				$('#search_input').append('<option value="'+yearStart+'">'+yearStart+'</option>');
			}		         
}

//---------------------------------------
//generate month <select>
//---------------------------------------
function gen_month(s){
	s.replaceWith('<select class="disb" id="search_input" name="search_input" placeholder="" value="s-slct">' +
		          '<option value="01">January</option>' +
		          '<option value="02">February</option>' +
		          '<option value="03">March</option>' +
		          '<option value="04">April</option>' +
		          '<option value="05">May</option>' +
		          '<option value="06">June</option>' +
		          '<option value="07">July</option>' +
		          '<option value="08">August</option>' +
		          '<option value="09">September</option>' +
		          '<option value="10">October</option>' +
		          '<option value="11">November</option>' +
		          '<option value="12">December</option>' +
		          '</select>');
}

//---------------------------------------
//discount radio box
//---------------------------------------
$('input[name=discButtons]').click(function() {
	var id=$(this).data("id");
	var slcted = $(this);
	var disc_field = slcted.closest('.discount-field');
	var disc_amf_field = slcted.closest(".price-field").find('.discount-amt-field');
	var inpt_amt = disc_amf_field.find('input[name=txtDisc]');
	var lbl = slcted.closest(disc_field).find('.lbl-disc');
	if(id=="disc_yes") { 
		disc_field.removeClass("large-6").addClass("large-3");
		inpt_amt.val("");
		disc_amf_field.show(); 
		lbl.text('Really? (ﾟヮﾟ)');
		inpt_amt.focus();
	}else{
		disc_field.removeClass("large-3").addClass("large-6");
		disc_amf_field.hide(); 
		inpt_amt.val(0);
		lbl.text('Do you really want to give a discount ?');
	}			
});



//---------------------------------------
//function for creating modal
//---------------------------------------
function create_modal(modal_size, logo, head, lead, txt, btn){
	var header = '<h2>'+logo+' '+head+'</h2>';
	var text = '<p>'+txt+'</p>';
	var button = btn;
	var close = '<a class="close-reveal-modal small">&#215;</a>';
	$('#myModal').addClass(modal_size);
	$('#myModal').html(header + text + button + close);
}

//---------------------------------------
//function for opening modal
//---------------------------------------
function open_modal(modal_id){
	$('#'+modal_id).foundation('reveal', 'open');
}

function close_Modal() {
  $('#myModal').foundation('reveal', 'close');
}


//---------------------------------------
//event on modal close
//---------------------------------------
$(document).on('close', '[data-reveal]', function () {
  var modal = $(this);
  var modal_id = modal.attr("id");
  
  if(modal_id != "myModal" && modal_id!="myHomeBox" && modal_id!="compose-msg"){
  	var form = modal.find("form");
  	var err = form.find(".errorMsg");
  	err.removeClass("alert-box").hide();
  	form[0].reset();
  }
  if(modal_id == "modalBanner"){
  	window.setTimeout(function(){location.reload()},1000);
  }
});

//if modal id is myModal set reveal animation option to fade
$(document).on('open.fndtn.reveal', '[data-reveal]', function () {
  var modal = $(this);
  if(modal.attr("id")=="myModal"){
  	$(modal).foundation('reveal', {animation: 'fade'})
  }
});


//---------------------------------------
//get button message for loading
//---------------------------------------
function get_btn_msg(x){
	var msg = $(x).data("msg");
	return msg;
}
//---------------------------------------
//AJAX submit form
//---------------------------------------
$('form')
  .on('invalid', function () {
    var invalid_fields = $(this).find('[data-invalid]');
    console.log(invalid_fields);
  })
  .on('valid', function (g) {

  	g.preventDefault();
    var form =$(this);
    var err_msg = $(this).find('.errorMsg');
    var btn = $(this).find('.submit_btn_ajax');
    var btn_msg = btn.val();


    err_msg.slideUp("fast"); 
    btn.val(get_btn_msg(btn));

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
            success: function (data) {
            	var result=trim(data);
            	var success="Success";
            	btn.val(btn_msg);
            	scrollPage(err_msg);

                if(result == "success" || result.indexOf(success) != -1){               	
                	err_msg.slideDown("fast"); 
                	err_msg.removeClass("alert").addClass("alert-box success");                	                	  
                	err_msg.html(result);
                	if(!(form.find("fieldset").hasClass("edit-field"))){
                		form[0].reset();
                		var frame = document.getElementById("textEditor"),
						frameDoc = frame.contentDocument || frame.contentWindow.document;
						frameDoc.documentElement.innerHTML = "";                		
                	}	
                	
                	if($('.user_name').length > 0){
                		$('.user_name').html($('#txtFullName').val());
                	}
                	if(form.find("fieldset").hasClass("edit-field")){
                		$('#my-display-element').html("");
                		toggle_blind();
						form.find('.cancelBtn').closest("span").addClass("hide");
						form.find('.editBtn').closest("span").removeClass("hide");
						form.find('fieldset').attr("disabled", "disabled");
						form.find('.submitBtn').attr("disabled", "disabled");
						
						scrollPage(form);
                	}
                	err_msg.delay(3500).slideUp(400);
                }else{
                	err_msg.removeClass("success").addClass("alert-box alert");           	
                	err_msg.html(result);
                	err_msg.slideDown("fast"); 
                }
            }
    });	
});


//-----------------------------------------------------------
//automatically send today's date to date start and next
//month's date end on input DOM elements
//-----------------------------------------------------------
$('select[name=optPackage]').on("change", function() {
	var slct = $(this);
	var type = slct.data("member");
	var code = $('option:selected', this).data('code');
	var session = $('option:selected', this).data('sess');
	var inpt_sess_dum = slct.closest("form").find('input[name=txtSession_dum]');
	var inpt_sess = slct.closest("form").find('input[name=txtSession]');
	var sess_field = slct.closest("form").find(".session-field");
	if(type=="pt"){
		if(session > 1){
			inpt_sess_dum.attr("disabled", "disabled");
			inpt_sess_dum.val(session);
			inpt_sess.val(session);
		}else{
			inpt_sess_dum.removeAttr("disabled");
			inpt_sess_dum.val(session);
			inpt_sess.val(session);
		}
		sess_field.slideDown("fast");

		if(slct.val()==""){$('.session-field').slideUp("fast");}
	}	
	

	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	var next_month = month+1;
	var inpt_start = slct.closest("form").find("input[name=txtStart]");
	var inpt_end = slct.closest("form").find("input[name=txtEnd]");
	
	if (month < 10) month = "0" + month;
	if (next_month < 10) next_month = "0" + next_month;

	if (month == 12){ next_month = "0" + 1; year= year+1;} 
	if (day < 10) day = "0" + day;

	var today = year + "-" + month + "-" + day;
	next_month = year + "-" + next_month + "-" + day;
	
	switch(code){
		case 'session': inpt_start.val(today);
						inpt_end.val(today);
			    break;
		case 'monthly': inpt_start.val(today);
					    inpt_end.val(next_month);
				break;
		default: 		inpt_start.val(today);
						inpt_end.val("");
				break;
	}	
});
//-----------------------------------------------------
//change hidden session field 
//-----------------------------------------------------
$('input[name=txtSession_dum]').on("keyup", function() {
	var inpt_sess_dum = $(this);
	var dum = inpt_sess_dum.val();	
	var inpt_sess = inpt_sess_dum.closest(".session-field").find("input[name=txtSession]");
	inpt_sess.val(dum.replace( /\s/g, ""));
});

//-----------------------------------------------------
//send first and last name to displayed input
//-----------------------------------------------------
 $('input[name=txtFName], input[name=txtLName]').on("keyup", function() {
 	var full_name = $('input[name=txtFName]').val() + " " + $('input[name=txtLName]').val();
 	$('#txtFullName').val(full_name);
 });

//-----------------------------------------------------
//create username using the user's first and last name
//-----------------------------------------------------
$('#txtFName, #txtLName').on("keyup", function() {
	var fname = $('#txtFName').val();
	var user = $('#txtFName').val() + '.' + $('#txtLName').val();	
	$('#txtUsername').val(user.replace( /\s/g, "")); //remove all white spaces
	$('.username-field').slideDown("fast");	
});

//---------------------------------------------------
//check if username or the user's name already exist
//---------------------------------------------------
$('#check_btn').click(function(event){
	event.preventDefault();
	var inpt_fname = $('#txtFName');
	var inpt_lname = $('#txtLName');
	var inpt_user = $('#txtUsername');
	var err = $(".errorMsg");
	var fname = inpt_fname.val();
	var lname = inpt_lname.val();
	var user = inpt_user.val();
	var loader = $(".preloader-div");

	if(inpt_fname.val() != "" && inpt_lname.val() != ""){
		inpt_user.val(user);
		loader.show();
		$('.username-field').slideDown("fast");

		var dataString = 'username='+ user + '&firstname='+ fname + '&lastname=' + lname;

		$.ajax({
        type: "POST",
        url: '../process/process_check_user.php',
        data: dataString,
		  	cache: false,
            success: function (data) {
            	var result=trim(data);
            	var c = 'already exist!';
            	
            	if(result == "success"){
            		loader.hide();
            		$("#check_btn").removeClass("alert").addClass("success");
            		$("#check_btn").html('<i class="fi-check"></i>');
                	err.slideUp("fast");
                }else if(result.indexOf(c) != -1){
                	loader.hide();  
                	$("#check_btn").removeClass("success");
            		$("#check_btn").html('Go'); 
                	$('#search_input').val(fname + " " + lname).focus();
                	err.removeClass("success, alert ").addClass("alert-box warning");           	
                	err.html(result);
                	err.slideDown("fast");                
                }else{               
                	loader.hide();  
                	$("#check_btn").removeClass("success");
            		$("#check_btn").html('Go');   
                	err.removeClass("success").addClass("alert-box alert");           	
                	err.html(result);
                	err.slideDown("fast");                
                }
            }
    	});	
	}
});
//---------------------------------------------------
//activate user account
//---------------------------------------------------
$('#checkboxThreeInput').on("change", function() {
	var	chkbx =  $("#checkboxThreeInput");
	var status = chkbx.closest(".checkStatus").find("input[name=txtStatus]");
	var form = chkbx.closest("form");
	var err_msg = chkbx.closest(".pricing-table").find(".errorMsg");

	if(chkbx.is(":checked")){ 
		status.val("1");
		prev_state = false;
	}else{
		status.val("0");
		prev_state = true;
	}

	err_msg.slideUp("fast");	
	$.ajax({
    type: form.attr('method'),
    url: form.attr('action'),
    data: form.serialize(),
      success: function (data) {
      	var result=trim(data);
      		if(result == "1"){ 
      			err_msg.html("Account has been activated!");	
      			err_msg.removeClass("alert").removeClass("secondary").addClass("alert-box success");
      			err_msg.slideDown("fast");           	     
          	err_msg.delay(2500).slideUp(400);
          	chkbx.val(result);
      		}else if(result== "0"){ 
      			err_msg.html("Account has been de-activated!");	
      			err_msg.removeClass("alert").removeClass("success").addClass("alert-box secondary");
      			err_msg.slideDown("fast");           	     
          	err_msg.delay(2500).slideUp(400);
          	chkbx.val(result);
      		}else{
      			chkbx.prop("checked", prev_state);
	          	err_msg.removeClass("success secondary").addClass("alert-box alert");           	
	          	err_msg.html(result);
	          	err_msg.slideDown("fast"); 
          }
      }
  }); 
});


function toggle_blind(){
	$('.show-when-disable, .hide-when-disable').toggle("blind");
}

//FORM BUTTONS
//---------------------------------------------------
//Enable fields when edit button is clicked
//---------------------------------------------------
$('.editBtn').click(function() { 
	var e_btn = $(this);
	e_btn.closest("form").find('.editBtn').closest("span").addClass("hide"); 		//hide edit button
	e_btn.closest("form").find('.cancelBtn').closest("span").removeClass("hide");
	e_btn.closest("form").find("fieldset").removeAttr("disabled");
	e_btn.closest("form").find('.submitBtn').removeAttr("disabled");
	toggle_blind();
});
//---------------------------------------------------
//Disable fields when cancel btn is clicked
//---------------------------------------------------
$('.cancelBtn').click(function() { 
	var c_btn = $(this);
	var form = c_btn.closest('form');
	var err_msg = c_btn.closest('form').find('.errorMsg');
	err_msg.html("").slideUp();
	form[0].reset();

	$('#my-display-element').html("");
	c_btn.closest("form").find('.cancelBtn').closest("span").addClass("hide");
	c_btn.closest("form").find('.editBtn').closest("span").removeClass("hide");
	c_btn.closest("form").find('fieldset').attr("disabled", "disabled");
	c_btn.closest("form").find('.submitBtn').attr("disabled", "disabled");
	toggle_blind();
	scrollPage(form);
});
//---------------------------------------------------
//Generate session options
//---------------------------------------------------
function gen_session(sess_type, slct_name){
	if(sess_type=="pt"){
		var option = '';
		$(slct_name).find('option').remove();

			for (var n = 1; n <= 31; n++){
				 option += '<option value="'+ n + '">' + n + '</option>';
			}
		        slct_name.append(option);
	}else{
		slct_name.replaceWith('<select name="txtSession" required>' +
		          '<option value="1">Session</option>' +
		          '<option value="30">Monthly</option>' +
		          '</select>');
	}
	
}

$('input[name=txtPackType]').on("change", function() {
	var rad_val = $(this).val();
	var target_slct = $("select[name=txtSession]");
	target_slct.removeAttr("disabled");
	gen_session(rad_val, target_slct);
});

*/