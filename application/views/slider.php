<div id="SLDR-ONE" class="sldr">
			<ul class="wrp animate">
				<li class="elmnt-one"><div class=""><div class="wrap"><img src="../../assets/images/1.jpg"></div></div></li>
				<li class="elmnt-two"><div class=""><div class="wrap"><img src="../../assets/images/2.jpg"></div></div></li>
				<li class="elmnt-three"><div class=""><div class="wrap"><img src="../../assets/images/3.jpg"></div></div></li>
				<li class="elmnt-four"><div class=""><div class="wrap"><img src="../../assets/images/4.jpg"></div></div></li>
								
			</ul>
		</div>


<script>

$( '.sldr' ).each( function() {
					var th = $( this );
					th.sldr({
						focalClass    : 'focalPoint',
						offset        : th.width() / 2,
						sldrWidth     : 'responsive',
						nextSlide     : th.nextAll( '.sldr-nav.next:first' ),
						previousSlide : th.nextAll( '.sldr-nav.prev:first' ),
						selectors     : th.nextAll( '.selectors:first' ).find( 'li' ),
						toggle        : th.nextAll( '.captions:first' ).find( 'div' ),
						sldrInit      : sliderInit,
						sldrStart     : slideStart,
						sldrComplete  : slideComplete,
						sldrLoaded    : sliderLoaded,
						sldrAuto      : true,
						sldrTime      : 4000,
						hasChange     : true
					});
				});
				
				
				
				

</script>