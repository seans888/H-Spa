	var isBookinPageLoaded	=	false;
	var filePath	    =	location.protocol+"//my.setmore.com/"
	var setmorePopup    =   function(bookingType,companyKey,resourceKey,isReschedule,isbookAppointmentResource,e)
	{
		if( e )
		{
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
		}

		var windowWidth		=	jQuery(window).width();
		if( windowWidth < 600 )
		{  
				switch(bookingType){
						case 'staff':
							window.open( filePath+'bookingpage/'+companyKey+'/resourcebookingpage/'+resourceKey , '_blank' );
							break;
						case 'class':
							window.open( filePath+'bookingpage/'+companyKey+'/bookclass' , '_blank' );
							break;
						case 'company':
							window.open( filePath+'shortBookingPage/'+companyKey , '_blank' );
							break;
			     }
			return;
		}

			var templ		=	{};
			templ.overlay	=	'<div id="setmore-overlay"></div>';
			templ.popup		=	'<div id="setmore-fancy-box" style= " background-color: #FFFFFF;height: auto;left: 50%;position: absolute;top: 0;width: 545px;z-index: 9999;">'+
											'<div id="setmore-fancy-box-close-icon"></div>'+
											'<div id="setmore-fancy-box-content">'+
											'</div>'+
										'</div>';
				init	=	function(ck)
							{
								if( !isBookinPageLoaded )
								{
									isBookinPageLoaded	=	true;
									this.renderTempl();
								}
								else
								{
									this.loadIframe();
									this.positionPopup();
									this.showPopup();
								}
							};
			renderTempl	=	function()
							{
								jQuery("body").append( templ.overlay ).append( templ.popup );
								this.positionPopup();
								this.loadIframe();
								this.bindEvents();
							};
		loadIframe		=	function()
							{
								if(isReschedule)
								{
									if(isbookAppointmentResource=="true")
									{
									jQuery("#setmore-fancy-box-content").html('<iframe id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="'+filePath+'rescheduleAppointment.do?cancellationKey='+companyKey+'&isStaffBookingPage=true"></iframe>');
									}
								else
									{
									jQuery("#setmore-fancy-box-content").html('<iframe id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="'+filePath+'rescheduleAppointment.do?cancellationKey='+companyKey+'"></iframe>');
									}
								}
								else
								{
									switch(bookingType){
											case 'staff':
												jQuery("#setmore-fancy-box-content").html('<iframe id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="'+filePath+'bookingpage/'+companyKey+'/resourcebookingpage/'+resourceKey+'"></iframe>');
												break;
											case 'class':
												jQuery("#setmore-fancy-box-content").html('<iframe id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="'+filePath+'bookingpage/'+companyKey+'/bookclass'+'"></iframe>');
												break;
											case 'company':
												jQuery("#setmore-fancy-box-content").html('<iframe id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="'+filePath+'shortBookingPage/'+companyKey+'"></iframe>');
												break;
						            }
								}
							};
		bindEvents		=	function()
							{
								var self	=	this;
								jQuery("#setmore-overlay , #setmore-fancy-box-close-icon").bind("click",function(){
									self.hidePopup();
								});
							};
		positionPopup	=	function()
							{
								var windowHeight		=	jQuery(window).height();
								var windowScrollHeight	=	jQuery(document).height();
								var windowScrollTop		=	jQuery(document).scrollTop();
								var popupWidth			=	jQuery("#setmore-fancy-box").width();
								var popupHeight			=	windowHeight - 100;

								jQuery("#setmore-overlay").height( windowScrollHeight+"px" );
								jQuery("#setmore-fancy-box").css( { 'margin-left' : "-"+(popupWidth/2)+"px" , 'margin-top' : ( ( ( windowHeight - popupHeight ) / 2 ) + windowScrollTop ) +"px"  } );
								jQuery('html').css('overflow','hidden');
							};
			hidePopup	=	function()
							{
								jQuery("#setmore-overlay,#setmore-fancy-box").hide();
								jQuery('html').css('overflow','auto');
							};
			showPopup	=	function()
							{
								jQuery("#setmore-overlay,#setmore-fancy-box").show();
							}
			this.init(companyKey);
	}

	//include required css file
	loadCss	=	function()
	{
		var cssFilePath		=	'<link href="'+filePath+'css/setmorePopup.css" rel="stylesheet" type="text/css" />';

		var appendCssFiles	=	function()
	    {
	    	jQuery("head").append( cssFilePath );
	    	setTimeout( function(){
	    		loadSetmoreFancyBox();
	    	}, 600);

	    };

	    //Binding click event to the "a" tag. Added this to override the FancyBox plugin
	    var loadSetmoreFancyBox	=	function()
	    {
	    	jQuery("[id=Setmore_button_iframe]").on('click', function( e )
	    	{
	    		e.preventDefault();
				e.stopPropagation();
				e.stopImmediatePropagation();

				var bookingPageLink	=	jQuery(this).attr("href");
				var urlSplitArray	=	bookingPageLink.split("/");
				
				
				for(var param in urlSplitArray){
					 if(urlSplitArray[param]=="resourcebookingpage"){
						    var resourceKey = urlSplitArray[ urlSplitArray.length - 1 ];
							var companyKey  = urlSplitArray[ urlSplitArray.length - 3 ];
							var bookingType = 'staff';
							setmorePopup( bookingType,companyKey, resourceKey );
					 }
					 else if(urlSplitArray[param]=="bookclass"){
						    var resourceKey = urlSplitArray[ urlSplitArray.length - 1 ];
							var companyKey  = urlSplitArray[ urlSplitArray.length - 2 ];
							var bookingType = 'class';
							setmorePopup( bookingType, companyKey, resourceKey );
					 } 
					 else if(urlSplitArray[param]=="shortBookingPage"){
							 if(urlSplitArray[ urlSplitArray.length - 2 ]=="shortBookingPage"){
								   var companyKey		=	urlSplitArray[ urlSplitArray.length - 1 ];
								   var bookingType = 'company';
								   var resourceKey = '';
									if(companyKey.indexOf("?") != -1)
									{
										companyKey		=	companyKey.split("?")[0];
									}
									setmorePopup( bookingType, companyKey, resourceKey);
							   }
					      }
				     }
	    	});
	    };

		if( typeof jQuery !== "undefined" )
		{
			appendCssFiles();
		}
		else
		{
		    var script = document.createElement("SCRIPT");
		    script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
		    script.type = 'text/javascript';
		    document.getElementsByTagName("head")[0].appendChild(script);

		    var checkReady = function(callback)
		    {
		        if (window.jQuery)
		        {
		            callback(jQuery);
		        }
		        else
		        {
		            window.setTimeout(function() { checkReady(callback); }, 100);
		        }
		    };

		    checkReady( function(jQuery)
		    {
		    	appendCssFiles();
		    });
		}
	}
	loadCss();