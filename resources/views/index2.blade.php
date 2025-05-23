
@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('meta')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="keywords" content="{{ $seo_setting->seo_title }}">
@endsection
@section('frontend-content')

    @if ($intro_content->visibility)
        @php
            $home2_intro = $intro_content->home2_intro;
            $property_types = $home2_intro->property_types;
            $locations = $home2_intro->locations;
        @endphp

		<!-- homec Hero -->
		<section id="hero" class="homec-hero homec-bg-cover p-relative" style="background-image:url({{ asset($home2_intro->bg_image) }});">
			<div class="homec-overlay"></div>
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-10 offset-md-1 col-12">
							<div class="homec-hero__inner">
								<svg class="homec-arrow-left" width="106" height="193" viewBox="0 0 106 193" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M41.5023 1.15691C14.2375 16.2178 -4.14265 43.6931 1.00245 74.3315C2.53343 83.4634 6.44872 93.3821 13.1666 100.543C11.7779 112.322 13.677 124.712 18.1444 135.489C24.5277 150.884 36.148 165.77 52.4032 172.661C62.4926 176.936 73.8871 178.399 84.5622 176.158C81.5002 179.845 78.8816 183.843 76.9324 188.127C75.3846 191.505 79.9859 194.096 82.2113 190.98C88.4356 182.269 94.8272 174.624 103.821 168.305C107.786 165.523 104.599 160.27 100.073 162.042C93.815 164.474 88.3687 161.589 84.2359 157.234C81.4333 154.285 76.4555 158.045 78.4633 161.415C81.1906 165.977 85.7752 168.631 90.8032 169.577C90.7279 169.648 90.6526 169.72 90.5857 169.783C51.575 182.905 18.7635 141.927 19.4495 105.828C21.1729 106.941 23.0218 107.903 25.0045 108.658C37.6456 113.498 51.8009 109.079 61.7899 101.004C71.8793 92.8337 79.0657 78.9173 71.9295 66.8765C65.3538 55.7815 50.5292 55.7497 39.8375 60.9793C27.1881 67.1785 19.3993 77.5344 15.576 89.3844C12.6563 84.5443 10.7572 79.0206 9.75329 73.9182C4.36558 46.6734 21.1311 20.446 43.7193 4.8685C45.9949 3.29485 44.0539 -0.249828 41.5023 1.15691ZM26.6945 80.5227C32.6678 71.208 44.2714 61.488 56.5946 62.402C63.9818 62.9504 68.6249 68.9032 68.9763 75.6588C69.3109 82.1441 65.5713 88.1287 60.8863 92.5635C53.3151 99.7085 41.0924 104.962 30.3755 101.711C26.5355 100.543 23.2895 98.4448 20.5705 95.7823C21.6916 90.362 23.6911 85.2039 26.6945 80.5227Z" fill="#F2C94C"/>
								</svg>
							<!-- Hero Content -->
							<div class="homec-hero__content">
								<h1 class="homec-hero__title">{{ $home2_intro->title }}</h1>
								<!-- Hero Tabs -->
								<div class="homec-hero__tabs">
									<!-- Features Tab List -->
									<div id="homec-tabs" class="list-group homec-tabs homec-tabs--noborder"  role="tablist">
										<a class="list-group-item active" data-bs-toggle="list" href="#homec-tab1" role="tab">{{__('user.Rent')}}</a>
										<a class="list-group-item" data-bs-toggle="list" href="#homec-tab2" role="tab">{{__('user.Sell')}}</a>
										<a class="list-group-item" data-bs-toggle="list" href="#homec-tab3" role="tab">{{__('user.Any')}}</a>
									</div>
								</div>
								<div class="homec-hero__tabs--detail">
									<div class="tab-content" id="nav-tabContent">
										<!--  Tab One -->
										<div class="tab-pane fade show active" id="homec-tab1" role="tabpanel">
											<div class="homec-filters homec-filters__margin">
												<form action="{{ route('properties') }}">
                                                    <input type="hidden" name="purpose" value="rent">
													<div class="homec-filter-group">
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Type')}}</span>
															<select name="type" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($property_types as $property_type)
																<option value="{{ $property_type->slug }}">{{ $property_type->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Locaiton')}}</span>
															<select name="location" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($locations as $single_location)
																<option value="{{ $single_location->slug }}">{{ $single_location->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span  class="homec-filter-group__label">{{__('user.Price Range')}}</span>
															<select class="select2" id="rent_price_range">
                                                                <option value="">{{__('user.Select')}}</option>
                                                                @foreach ($filter_prices as $filter_price)
                                                                <option data-min-price="{{ $filter_price->min }}" data-max-price="{{ $filter_price->max }}" value="{{ $filter_price->min.':'.$filter_price->max }}">{{ $currency_icon }}{{ $filter_price->min }} - {{ $currency_icon }}{{ $filter_price->max }}</option>
                                                                @endforeach
															</select>
														</div>

                                                        <!-- Button -->

                                                        <input type="hidden" name="min_price" value="0" id="rent_min_price">
                                                        <input type="hidden" name="max_price" value="0" id="rent_max_price">


														<button type="submit" class="homec-btn homec-btn__second">
															<span class="homec-btn__inside">
																<span>
																	<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M8.45185 16.8948C10.3289 16.8949 12.1522 16.2686 13.633 15.1152L19.2197 20.7019C19.637 21.105 20.3021 21.0934 20.7051 20.6761C21.0983 20.269 21.0983 19.6236 20.7051 19.2165L15.1184 13.6298C17.9805 9.9456 17.314 4.63881 13.6298 1.77676C9.94555 -1.08529 4.63881 -0.418815 1.77676 3.26541C-1.08529 6.94964 -0.418815 12.2564 3.26541 15.1185C4.74865 16.2707 6.57361 16.8958 8.45185 16.8948ZM3.96301 3.95978C6.44215 1.48059 10.4616 1.48054 12.9408 3.95969C15.42 6.43883 15.4201 10.4583 12.9409 12.9375C10.4618 15.4167 6.44229 15.4167 3.9631 12.9376C3.96305 12.9376 3.96305 12.9376 3.96301 12.9375C1.48386 10.4764 1.46926 6.47159 3.93034 3.99245C3.94121 3.98153 3.95209 3.97065 3.96301 3.95978Z" fill="#111111"/>
																	</svg>
																</span>
																<span>{{__('user.Search')}}</span>
															</span>
														</button>
													</div>
												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="homec-tab2" role="tabpanel">
											<div class="homec-filters homec-filters__margin">
												<form action="{{ route('properties') }}">
                                                    <input type="hidden" name="purpose" value="sale">

													<div class="homec-filter-group">
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Type')}}</span>
															<select name="type" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($property_types as $property_type)
																<option value="{{ $property_type->slug }}">{{ $property_type->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Locaiton')}}</span>
															<select name="location" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($locations as $single_location)
																<option value="{{ $single_location->slug }}">{{ $single_location->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span  class="homec-filter-group__label">{{__('user.Price Range')}}</span>
															<select class="select2" id="sale_price_range">
                                                                <option value="">{{__('user.Select')}}</option>
                                                                @foreach ($filter_prices as $filter_price)
                                                                <option data-min-price="{{ $filter_price->min }}" data-max-price="{{ $filter_price->max }}" value="{{ $filter_price->min.':'.$filter_price->max }}">{{ $currency_icon }}{{ $filter_price->min }} - {{ $currency_icon }}{{ $filter_price->max }}</option>
                                                                @endforeach
															</select>
														</div>

                                                        <input type="hidden" name="min_price" value="0" id="sale_min_price">
                                                        <input type="hidden" name="max_price" value="0" id="sale_max_price">

														<!-- Button -->
														<button type="submit" class="homec-btn homec-btn__second">
															<span class="homec-btn__inside">
																<span>
																	<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M8.45185 16.8948C10.3289 16.8949 12.1522 16.2686 13.633 15.1152L19.2197 20.7019C19.637 21.105 20.3021 21.0934 20.7051 20.6761C21.0983 20.269 21.0983 19.6236 20.7051 19.2165L15.1184 13.6298C17.9805 9.9456 17.314 4.63881 13.6298 1.77676C9.94555 -1.08529 4.63881 -0.418815 1.77676 3.26541C-1.08529 6.94964 -0.418815 12.2564 3.26541 15.1185C4.74865 16.2707 6.57361 16.8958 8.45185 16.8948ZM3.96301 3.95978C6.44215 1.48059 10.4616 1.48054 12.9408 3.95969C15.42 6.43883 15.4201 10.4583 12.9409 12.9375C10.4618 15.4167 6.44229 15.4167 3.9631 12.9376C3.96305 12.9376 3.96305 12.9376 3.96301 12.9375C1.48386 10.4764 1.46926 6.47159 3.93034 3.99245C3.94121 3.98153 3.95209 3.97065 3.96301 3.95978Z" fill="#111111"/>
																	</svg>
																</span>
																<span>{{__('user.Search')}}</span>
															</span>
														</button>
													</div>
												</form>
											</div>
										</div>
										<!-- End Tab One -->
										<div class="tab-pane fade" id="homec-tab3" role="tabpanel">
											<div class="homec-filters homec-filters__margin">
												<form action="{{ route('properties') }}">
                                                    <input type="hidden" name="purpose" value="any">
													<div class="homec-filter-group">
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Type')}}</span>
															<select name="type" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($property_types as $property_type)
																<option value="{{ $property_type->slug }}">{{ $property_type->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span class="homec-filter-group__label">{{__('user.Locaiton')}}</span>
															<select name="location" class="select2">
																<option value="" data-display="">{{__('user.Select')}}</option>
                                                                @foreach ($locations as $single_location)
																<option value="{{ $single_location->slug }}">{{ $single_location->name }}</option>
                                                                @endforeach
															</select>
														</div>
														<!-- Form Group -->
														<div class="form-group">
															<span  class="homec-filter-group__label">{{__('user.Price Range')}}</span>
															<select class="select2" id="any_price_range">
                                                                <option value="">{{__('user.Select')}}</option>
                                                                @foreach ($filter_prices as $filter_price)
                                                                <option data-min-price="{{ $filter_price->min }}" data-max-price="{{ $filter_price->max }}" value="{{ $filter_price->min.':'.$filter_price->max }}">{{ $currency_icon }}{{ $filter_price->min }} - {{ $currency_icon }}{{ $filter_price->max }}</option>
                                                                @endforeach
															</select>
														</div>

                                                        <input type="hidden" name="min_price" value="0" id="any_min_price">
                                                        <input type="hidden" name="max_price" value="0" id="any_max_price">

														<!-- Button -->
														<button type="submit" class="homec-btn homec-btn__second">
															<span class="homec-btn__inside">
																<span>
																	<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M8.45185 16.8948C10.3289 16.8949 12.1522 16.2686 13.633 15.1152L19.2197 20.7019C19.637 21.105 20.3021 21.0934 20.7051 20.6761C21.0983 20.269 21.0983 19.6236 20.7051 19.2165L15.1184 13.6298C17.9805 9.9456 17.314 4.63881 13.6298 1.77676C9.94555 -1.08529 4.63881 -0.418815 1.77676 3.26541C-1.08529 6.94964 -0.418815 12.2564 3.26541 15.1185C4.74865 16.2707 6.57361 16.8958 8.45185 16.8948ZM3.96301 3.95978C6.44215 1.48059 10.4616 1.48054 12.9408 3.95969C15.42 6.43883 15.4201 10.4583 12.9409 12.9375C10.4618 15.4167 6.44229 15.4167 3.9631 12.9376C3.96305 12.9376 3.96305 12.9376 3.96301 12.9375C1.48386 10.4764 1.46926 6.47159 3.93034 3.99245C3.94121 3.98153 3.95209 3.97065 3.96301 3.95978Z" fill="#111111"/>
																	</svg>
																</span>
																<span>{{__('user.Search')}}</span>
															</span>
														</button>
													</div>
												</form>
											</div>
										</div>
										<!-- End Tab One -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End homec Hero -->
    @endif


    @if ($category->visibility)

        @php
            $property_types = $category->property_types;
        @endphp
		<!-- Features Area -->
		<section class="homec-features homec-features__v2">
			<div class="container">
				<div class="row">
                    @foreach ($property_types as $property_type)
					<div class="col-lg-3 col-md-6 col-12 mg-top-30" data-aos="fade-up" data-aos-delay="400">
						<!-- Single Feature -->
						<a href="{{ route('properties', ['type' => $property_type->slug]) }}" class="homec-features__single">
							<div class="homec-features__icon">
								<img src="{{ asset($property_type->icon) }}" alt="icon">
							</div>
							<div class="homec-features__content">
								<h3 class="homec-features__title">{{ $property_type->name }}</h3>
								<p class="homec-features__text">{{ $property_type->totalProperty }}+ {{__('user.Property')}}</p>
							</div>
						</a>
						<!-- End Single Feature -->
					</div>
                    @endforeach
				</div>
			</div>
		</section>
		<!-- End Features Area -->
    @endif

    @if ($about_us->visibility)
        @php
            $home2_content = $about_us->home2_content;
        @endphp

		<!-- About Area -->
		<section class="homec-about pd-top-100 pd-btm-130">
			<div class="homec-shape">
				<img class="homec-shape-single homec-shape-1" src="{{ asset('frontend/img/anim-shape-1.svg') }}" alt="icon">
				<img class="homec-shape-single homec-shape-2" src="{{ asset('frontend/img/anim-shape-2.svg') }}" alt="icon">
				<img class="homec-shape-single homec-shape-3" src="{{ asset('frontend/img/anim-shape-3.svg') }}" alt="icon">
			</div>
			<div class="container homec-container-medium">
				<div class="row  homec-container-medium__row align-items-center">
					<div class="col-lg-7 col-12 homec-about__column--one mg-top-30" data-aos="fade-right" data-aos-delay="400">
						<!-- Homec Image Group -->
						<div class="homec-image-group">
							<div class="homec-image-group__single">
								<img src="{{ asset($home2_content->image1) }}" alt="image1">
								<img src="{{ asset($home2_content->image2) }}" alt="image2">
							</div>
							<div class="homec-image-group__content">
								<h4 class="homec-image-group__title">{{ $home2_content->percentage }}</h4>
								<p class="homec-image-group__text">{{ $home2_content->percentage_text }}</p>
							</div>
						</div>
						<!-- End Homec Image Group -->
					</div>
					<div class="col-lg-5 col-12 homec-about__column--two mg-top-30">
						<div class="homec-about-content">
							<!-- Section Title -->
							<div class="homec-section__head">
								<div class="homec-section__shape">
									<span class="homec-section__badge homec-section__badge--shape" data-aos="fade-down" data-aos-delay="300">{{ $home2_content->short_title }}</span>
								</div>
								<h2 class="homec-section__title" data-aos="fade-in" data-aos-delay="400">{{ $home2_content->long_title }}</h2>
							</div>
							<div class="homec-about-content__inner mg-top-20" data-aos="fade-in" data-aos-delay="500">
								<p class="homec-about-content__text">{{ $home2_content->description1 }}</p>
								<div class="homec-focus-content homec-border mg-top-20">
									<p>{{ $home2_content->description2 }}</p>
								</div>
								<!-- Homec List -->
								<ul class="homec-iconic-list list-none mg-top-30">
									<li><i class="fa-solid fa-check"></i>{{ $home2_content->item1 }}</li>
									<li><i class="fa-solid fa-check"></i>{{ $home2_content->item2 }}</li>
								</ul>
								<!-- Homec Button -->
								<div class="mg-top-40">
									<a href="{{ route('contact-us') }}" class="homec-btn"><span>{{__('user.Contact Us')}}</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End About Area -->
    @endif


    @if ($featured_property->visibility)
		<!-- Properties Listing -->
		<section class="homec-properties homec-bg-cover homec-bg-third-color pd-top-90 pd-btm-120 homec-featured-property-bg">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="homec-flex homec-flex__section mg-btm-60">
							<!-- Section TItle -->
							<div class="homec-section__head m-0 mg-top-30">
								<span class="homec-section__badge homec-primary-color homec-section__badge--small m-0"  data-aos="fade-in" data-aos-delay="300">{{ $featured_property->title }}</span>
								<h2 class="homec-section__title"  data-aos="fade-in" data-aos-delay="400">{{ $featured_property->description }}</h2>
							</div>
							<!-- Button -->
							<div class="homec-section__btn mg-top-30" data-aos="fade-right" data-aos-delay="500">
								<a href="{{ route('properties',['featured_property' => 'enable']) }}" class="homec-btn"><span>{{__('user.See Featured  Properties')}}</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    @php
                        $featured_properties = $featured_property->properties;
                    @endphp

					<div class="col-12">
						<div class="swiper mySwiper homec-slider-property loading">
							<div class="swiper-wrapper">

                                @foreach ($featured_properties as $featured_property)
                                    <div class="swiper-slide">
                                        <!-- Single property-->
                                        <div class="homec-property">
                                            <!-- Property Head-->
                                            <div class="homec-property__head">
                                                <img src="{{ asset($featured_property->thumbnail_image) }}" alt="thumbnail_image">
                                                <!-- Top Sticky -->
                                                <div class="homec-property__hsticky">
                                                    <div class="homec-heart-df">
                                                    <a href="javascript:;" class="homec-heart add-to-wishlist" data-property-id="{{ $featured_property->id }}">
                                                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5745 3.73257L11.1008 4.69447L11.6272 3.73258C11.9704 3.10535 12.5438 2.26267 13.3886 1.60933C14.2595 0.935774 15.2355 0.6 16.3044 0.6C19.29 0.6 21.6017 3.03446 21.6017 6.3966C21.6017 8.18186 20.8932 9.70959 19.5597 11.3187C18.211 12.9462 16.2694 14.6033 13.8617 16.6552L14.2508 17.1119L13.8617 16.6552L13.8611 16.6557C13.0479 17.3487 12.1237 18.1363 11.1625 18.9769L11.1623 18.977C11.1457 18.9916 11.1241 18.9999 11.1008 18.9999C11.0776 18.9999 11.056 18.9916 11.0394 18.9771L11.0391 18.9768C10.0784 18.1367 9.15452 17.3493 8.34203 16.6569L8.34054 16.6556L8.34053 16.6556C5.93251 14.6035 3.99081 12.9463 2.64202 11.3188C1.30844 9.70958 0.6 8.18186 0.6 6.3966C0.6 3.03446 2.91167 0.6 5.89732 0.6C6.96614 0.6 7.94219 0.935773 8.81311 1.60933C9.6579 2.26267 10.2313 3.10532 10.5745 3.73257Z" stroke-width="1.2"/>
                                                        </svg>
                                                        </a>
                                                        <a href="javascript:;" class="homec-heart add-to-compare" data-property-id="{{ $featured_property->id }}">
                                                            <span>
                                                                <i class="fa-solid fa-shuffle"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <span class="homec-property__salebadge">

                                                        @if ($featured_property->purpose == 'rent')
                                                            {{__('user.For Rent')}}
                                                        @else
                                                            {{__('user.For Sale')}}
                                                        @endif
                                                    </span>

                                                </div>
                                                <!-- End Top Sticky -->
                                            </div>
                                            <!-- Property Body-->
                                            <div class="homec-property__body">
                                                <div class="homec-property__topbar">
                                                    <div class="homec-property__price">{{ $currency_icon }}{{ html_decode(num_format($featured_property->price)) }}
                                                        @if ($featured_property->purpose == 'rent')
                                                        <span>/{{ $featured_property->rent_period }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <h3 class="homec-property__title"><a href="{{ route('property', html_decode($featured_property->slug)) }}">{{ html_decode($featured_property->title) }}</a></h3>
                                                <div class="homec-property__text">
                                                    <img src="{{ asset('frontend/img/location-icon.svg') }}" alt="address"><p>{{ html_decode($featured_property->address) }}</p>
                                                </div>
                                                <!-- Property List-->
                                                <ul class="homec-property__list homec-border-top list-none">
                                                    <li><img src="{{ asset('frontend/img/room-icon2.svg') }}" alt="total_bedroom">{{ $featured_property->total_bedroom }} {{__('user.Bed')}}</li>
                                                    <li><img src="{{ asset('frontend/img/bath-icon2.svg') }}" alt="total_bathroom">{{ $featured_property->total_bathroom }} {{__('user.Bath')}}</li>
                                                    <li><img src="{{ asset('frontend/img/size-icon2.svg') }}" alt="total_area">{{ html_decode($featured_property->total_area) }} {{__('user.m2')}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Single property-->
                                    </div>
                                @endforeach
							</div>
						</div>
						<!-- Slider Pagination -->
						<div class="swiper-pagination swiper-pagination__property"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Properties Listing -->
    @endif

    @if ($setting->agent_can_add_property)
        @if ($setting->agent_can_add_property == 'enable')
            @if ($agent->visibility)
                <!-- Agents -->
                <section class="homec-bg-third-color homec-bg-cover pd-top-90 pd-btm-120" style="background-image: url({{ asset($agent->home2_agent_bg) }});">
                    <div class="homec-overlay"></div>
                    <div class="section-inside-bg homec-agent-inside"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="homec-flex homec-flex__section mg-btm-60">
                                    <div class="homec-section__head section-white homec-section__head__half m-0 mg-top-30">
                                        <span class="homec-section__badge homec-second-color homec-section__badge--small m-0"  data-aos="fade-in" data-aos-delay="300">{{ $agent->title }}</span>
                                        <h2 class="homec-section__title"  data-aos="fade-in" data-aos-delay="400">{{ $agent->description }}</h2>
                                    </div>
                                    <div class="homec-section__btn mg-top-30" data-aos="fade-right" data-aos-delay="500">
                                        <a href="{{ route('agents') }}" class="homec-btn"><span>{{__('user.See All Agents')}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper mySwiper homec-slider-agent loading">
                                    <div class="swiper-wrapper">
                                        @foreach ($agent->agents as $agent_index => $single_agent )
                                            <div class="swiper-slide">
                                                <!-- Single agent-->
                                                <div class="homec-agent">
                                                    <!-- Agent Head-->
                                                    <div class="homec-agent__head">
                                                        @if ($single_agent->image)
                                                        <img src="{{ asset($single_agent->image) }}" alt="agent">
                                                        @else
                                                        <img src="{{ asset($default_user_avatar) }}" alt="agent">
                                                        @endif
                                                        <ul class="homec-agent__social list-none">
                                                            @if ($single_agent->linkedin)
                                                                <li><a href="{{ html_decode($single_agent->linkedin) }}"><i class="fab fa-linkedin-in"></i></a></li>
                                                            @endif

                                                            @if ($single_agent->twitter)
                                                            <li><a href="{{ html_decode($single_agent->twitter) }}"><i class="fab fa-twitter"></i></a></li>
                                                            @endif

                                                            @if ($single_agent->instagram)
                                                            <li><a href="{{ html_decode($single_agent->instagram) }}"><i class="fab fa-instagram"></i></a></li>
                                                            @endif

                                                            @if ($single_agent->facebook)
                                                            <li><a href="{{ html_decode($single_agent->facebook) }}"><i class="fab fa-facebook-f"></i></a></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <!-- Agent Body -->
                                                    <div class="homec-agent__body">
                                                        <h4 class="homec-agent__title position_relitive">

                                                            <a href="{{ route('agent', ['agent_type' => 'agent', 'user_name' => html_decode($single_agent->user_name)]) }}">{{ html_decode($single_agent->name) }}

                                                                @php
                                                                $kyc = Modules\Kyc\Entities\KycInformation::where('user_id',$single_agent->id)->where('status',1)->first();
                                                                @endphp
                                                                @if($kyc)

                                                                <span class="varified-badge">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z">

                                                                    </path>
                                                                    </svg>
                                                                </span>
                                                                @endif

                                                        </a>

                                                        <span>{{ html_decode($single_agent->designation) }}</span>
                                                </h4>
                                                    </div>
                                                    <!-- End Agent Body -->
                                                </div>
                                                <!-- End Single agent-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Slider Pagination -->
                                <div class="swiper-pagination swiper-pagination__start swiper-pagination--white  swiper-pagination__agent"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Agents -->
            @endif
        @endif
    @endif

   @if ($location->visibility)
            <!-- Property Listing -->
            <section class="pd-top-120 pd-btm-120">
                <div class="container homec-listing__container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Section TItle -->
                            <div class="homec-section__head text-center mg-btm-60">
                                <span class="homec-section__badge homec-primary-color homec-section__badge--small m-0"  data-aos="fade-in" data-aos-delay="300">{{ $location->title }}</span>
                                <h2 class="homec-section__title"  data-aos="fade-in" data-aos-delay="400">{{ $location->description }}</h2>
                            </div>
                            <!-- Homec Search -->
                            <div class="homec-search-form mg-top-10" data-aos="fade-up" data-aos-delay="500">
                                <form class="homec-search-form__form homec-search-form__form--city" action="{{ route('properties') }}">
                                    <div class="homec-search-form__group">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_275_829" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                            <path d="M0 2.9405e-05H24V24H0V2.9405e-05Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_275_829)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 24C12.2351 24 12.4546 23.8825 12.585 23.6869C13.1198 22.8847 13.7306 22.0293 14.3771 21.124C14.5713 20.852 14.7687 20.5756 14.9682 20.2947C15.8268 19.086 16.717 17.8062 17.5208 16.4992C19.1133 13.9099 20.4375 11.1064 20.4375 8.43752C20.4375 3.78447 16.653 2.9405e-05 12 2.9405e-05C7.34694 2.9405e-05 3.5625 3.78447 3.5625 8.43752C3.5625 11.1064 4.88667 13.9099 6.47921 16.4992C7.28303 17.8062 8.17317 19.086 9.03176 20.2947C9.23131 20.5756 9.42873 20.852 9.62293 21.124C10.2694 22.0293 10.8802 22.8847 11.415 23.6869C11.5454 23.8825 11.7649 24 12 24ZM7.67704 15.7625C6.10551 13.2073 4.96875 10.6905 4.96875 8.43752C4.96875 4.56111 8.12359 1.40628 12 1.40628C15.8764 1.40628 19.0312 4.56111 19.0312 8.43752C19.0312 10.6905 17.8945 13.2073 16.3229 15.7625C15.5447 17.0278 14.6771 18.2763 13.8218 19.4803C13.6277 19.7535 13.4339 20.0249 13.2418 20.2939C12.8133 20.894 12.3936 21.4818 12 22.0486C11.6064 21.4818 11.1867 20.894 10.7582 20.2939C10.5661 20.0249 10.3723 19.7534 10.1782 19.4803C9.32291 18.2763 8.45524 17.0278 7.67704 15.7625Z" fill="#7E8BA0"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.78125 8.4375C7.78125 10.7642 9.67325 12.6562 12 12.6562C14.3267 12.6562 16.2187 10.7642 16.2187 8.4375C16.2187 6.11076 14.3267 4.21876 12 4.21876C9.67325 4.21876 7.78125 6.11076 7.78125 8.4375ZM12 11.25C10.4499 11.25 9.1875 9.9876 9.1875 8.4375C9.1875 6.88741 10.4499 5.62501 12 5.62501C13.5501 5.62501 14.8125 6.88741 14.8125 8.4375C14.8125 9.9876 13.5501 11.25 12 11.25Z" fill="#7E8BA0"/>
                                            </g>
                                        </svg>
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <select name="location" class="select2">
                                                <option value="">{{__('user.Select Location')}}</option>
                                                @foreach ($location->location_for_filter as $location_for_filter)
                                                <option value="{{ $location_for_filter->slug }}">{{ $location_for_filter->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="homec-btn">
                                        <span class="homec-btn__inside">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.45185 16.8948C10.3289 16.8949 12.1522 16.2686 13.633 15.1152L19.2197 20.7019C19.637 21.105 20.3021 21.0934 20.7051 20.6761C21.0983 20.269 21.0983 19.6236 20.7051 19.2165L15.1184 13.6298C17.9805 9.9456 17.314 4.63881 13.6298 1.77676C9.94555 -1.08529 4.63881 -0.418815 1.77676 3.26541C-1.08529 6.94964 -0.418815 12.2564 3.26541 15.1185C4.74865 16.2707 6.57361 16.8958 8.45185 16.8948ZM3.96301 3.95978C6.44215 1.48059 10.4616 1.48054 12.9408 3.95969C15.42 6.43883 15.4201 10.4583 12.9409 12.9375C10.4618 15.4167 6.44229 15.4167 3.9631 12.9376C3.96305 12.9376 3.96305 12.9376 3.96301 12.9375C1.48386 10.4764 1.46926 6.47159 3.93034 3.99245C3.94121 3.98153 3.95209 3.97065 3.96301 3.95978Z"></path>
                                            </svg>
                                            <span>{{__('user.Search')}}</span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <!-- End Homec Search -->
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $home_locations = $location->locations;
                            $second_property = false;
                            $third_property = false;

                            $four_property = false;
                            $five_property = false;

                            $six_property = false;
                            $seven_property = false;
                        @endphp

                        <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                            <!-- Homec Listing -->
                            <div class="homec-listing mg-top-40">
                                @foreach ($home_locations as $loc_index => $home_location)
                                    @if ($loc_index == 0)
                                        <!-- Homec Single Listing -->
                                        <div class="homec-listing__single">
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__big" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Homec Single Listing -->
                                    @elseif ($loc_index == 1 || $loc_index == 2)
                                     <!-- Homec Single Listing -->
                                        @if ($second_property == false)
                                            <div class="homec-listing__single">
                                        @endif

                                        @if ($loc_index == 1)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__small"  src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>

                                            @php
                                                $second_property = true;
                                            @endphp
                                        @endif

                                        @if ($loc_index == 2)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__medium" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>
                                            @php
                                                $third_property = true;
                                            @endphp

                                        @endif

                                        @if ($third_property == true)
                                        </div>
                                        @endif

                                    <!-- End Homec Single Listing -->

                                    @elseif ($loc_index == 3)
                                        <!-- Homec Single Listing -->
                                        <div class="homec-listing__single">
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__big" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Homec Single Listing -->

                                    @elseif ($loc_index == 4 || $loc_index == 5)
                                        <!-- Homec Single Listing -->
                                        @if ($four_property == false)
                                            <div class="homec-listing__single">
                                        @endif

                                        @if ($loc_index == 4)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__medium" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>

                                            @php
                                                $four_property = true;
                                            @endphp
                                        @endif

                                        @if ($loc_index == 5)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__small" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>

                                            @php
                                                $five_property = true;
                                            @endphp
                                        @endif

                                        @if ($five_property == true)
                                        </div>
                                        @endif
                                        <!-- End Homec Single Listing -->
                                    @elseif ($loc_index == 6 || $loc_index == 7)
                                        <!-- Homec Single Listing -->
                                        @if ($six_property == false)
                                            <div class="homec-listing__single homec-listing__single--last">
                                        @endif

                                        @if ($loc_index == 6)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__small" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>

                                            @php
                                                $six_property = true;
                                            @endphp
                                        @endif

                                        @if ($loc_index == 7)
                                            <div class="homec-listing__inner">
                                                <a href="{{ route('properties', ['location' => $home_location->slug]) }}">
                                                    <img class="homec-listing__single__medium" src="{{ asset($home_location->image) }}" alt="home_location">
                                                    <div class="homec-overlay homec-listing__overlay"></div>
                                                    <h4 class="homec-listing__title"><span>{{ $home_location->totalProperty }}+ {{__('user.Property')}}</span>{{ $home_location->name }}</h4>
                                                </a>
                                            </div>

                                            @php
                                                $seven_property = true;
                                            @endphp
                                        @endif

                                        @if ($seven_property == true)
                                        </div>
                                        @endif
                                        <!-- End Homec Single Listing -->

                                    @endif
                                @endforeach

                            </div>
                            <!-- End Homec Listing -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  d-flex justify-content-center mg-top-40" data-aos="fade-up" data-aos-delay="700">
                            <!-- Section TItle -->
                            <a href="{{ route('properties') }}" class="homec-btn"><span>{{__('user.Search Property')}}</span></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Property Listing -->
        @endif

        @if ($counter->visibility)
            @php
                $counter_content = $counter->content;
            @endphp
            <!-- FunFacts -->
            <section class="homec-funfacts pd-btm-100">
                <img src="{{ asset($counter_content->bg_image) }}" alt="bg_image">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="homec-funfact homec-border homec-funfact--bg">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-12">
                                        <div class="homec-funfact__inner">
                                            <div class="homec-funfact__content"  data-aos="fade-up" data-aos-delay="300">
                                                <h2 class="homec-section__title mg-btm-10">{{ $counter_content->title }}</h2>
                                                <p>{{ $counter_content->description }}</p>
                                            </div>
                                            <!-- Homec List -->
                                            <ul class="homec-iconic-list list-none mg-top-30"  data-aos="fade-up" data-aos-delay="400">
                                                <li><i class="fa-solid fa-check"></i>{{ $counter_content->list_1 }}</li>
                                                <li><i class="fa-solid fa-check"></i>{{ $counter_content->list_2 }}</li>
                                                <li><i class="fa-solid fa-check"></i>{{ $counter_content->list_3 }}</li>
                                            </ul>
                                            <!-- Homec Button -->
                                            <div class="homec-btn__main mg-top-40"  data-aos="fade-up" data-aos-delay="500">
                                                <a href="{{ route('contact-us') }}" class="homec-btn"><span>{{__('user.Contact Us')}}</span></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-12">
                                        <div class="homec-funfacts">
                                            <div class="row">
                                                @foreach ($counter->items as $counter_item)
                                                    <div class="col-lg-6 col-md-6 col-12"  data-aos="fade-in" data-aos-delay="400">
                                                        <!-- FunFacts Single -->
                                                        <div class="homec-funfact__single homec-border">
                                                            <div class="homec-funfact__icon">
                                                                <img src="{{ asset($counter_item->icon) }}" alt="icon">
                                                            </div>
                                                            <h3 class="homec-funfact__number"><span class="counter">{{ $counter_item->number }}</span></h3>
                                                            <p class="homec-funfact__text">{{ $counter_item->title }}</p>
                                                        </div>
                                                        <!-- End FunFacts Single -->
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End FunFacts Area -->
        @endif

        @if ($setting->agent_can_add_property)
            @if ($setting->agent_can_add_property == 'enable')
                @if ($pricing_plan->visibility)
                    <!-- Pricing -->
                    <section class="pd-btm-120">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Section TItle -->
                                    <div class="homec-section__head text-center mg-btm-30">
                                        <span class="homec-section__badge homec-section__badge--small homec-primary-color m-0" data-aos="fade-in" data-aos-delay="300">{{ $pricing_plan->title }}</span>
                                        <h2 class="homec-section__title" data-aos="fade-in" data-aos-delay="400">{{ $pricing_plan->description }}</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($pricing_plan->pricing_plans as $index => $pricing_plan_item)
                                    <div class="col-lg-4 col-md-4 col-12 mg-top-30" data-aos="fade-up" data-aos-delay="400">
                                        <!-- Pricing Single -->
                                        <div class="homec-psingle {{ ++$index % 2 == 0 ? 'homec-psingle__active' : '' }} ">
                                            <div class="homec-psingle__head">
                                                <h4 class="homec-psingle__title">{{ $pricing_plan_item->plan_name }}</h4>
                                                <div class="homec-psingle__amount">
                                                    <span class="homec-psingle__currency">{{ $currency_icon }}</span>{{ $pricing_plan_item->plan_price }}<span>/
                                                        @if ($pricing_plan_item->expired_time == 'monthly')
                                                        {{__('user.Monthly')}}
                                                        @elseif ($pricing_plan_item->expired_time == 'yearly')
                                                        {{__('user.Yearly')}}
                                                        @elseif ($pricing_plan_item->expired_time == 'lifetime')
                                                        {{__('user.Lifetime')}}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="homec-psingle__body">
                                                <ul class="homec-psingle__list">

                                                    @if ($pricing_plan_item->max_agent_add > 0)
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Agency Profile')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>{{__('user.Agency Profile')}}</li>
                                                    @endif

                                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{ $pricing_plan_item->max_agent_add }} {{__('user.Agent')}}</li>


                                                    @if ($pricing_plan_item->number_of_property == -1)
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Unlimited')}} {{__('user.Property Submission')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{ $pricing_plan_item->number_of_property }} {{__('user.Property Submission')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->featured_property == 'enable')
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Featured Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>{{__('user.Featured Property')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->featured_property_qty == -1)
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Unlimited')}} {{__('user.Featured Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{ $pricing_plan_item->featured_property_qty }} {{__('user.Featured Property')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->top_property == 'enable')
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Top Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>{{__('user.Top Property')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->top_property_qty == -1)
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Unlimited')}} {{__('user.Top Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{ $pricing_plan_item->top_property_qty }} {{__('user.Top Property')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->urgent_property == 'enable')
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Urgent Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>{{__('user.Urgent Property')}}</li>
                                                    @endif

                                                    @if ($pricing_plan_item->urgent_property_qty == -1)
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Unlimited')}} {{__('user.Urgent Property')}}</li>
                                                    @else
                                                        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{ $pricing_plan_item->urgent_property_qty }} {{__('user.Urgent Property')}}</li>
                                                    @endif

                                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Aminities')}}</li>

                                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>{{__('user.Nearest Location')}}</li>


                                                </ul>
                                                <div class="homec-psingle__button">
                                                    @if ($pricing_plan_item->plan_type == 'free')
                                                    <a href="{{ route('free-enroll', $pricing_plan_item->plan_slug) }}" class="homec-btn homec-btn__thrid"><span>{{__('user.Trail Now')}}</span></a>
                                                    @else
                                                    <a href="{{ route('payment', $pricing_plan_item->plan_slug) }}" class="homec-btn homec-btn__thrid"><span>{{__('user.Enroll Now')}}</span></a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Pricing Single -->
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </section>
                    <!-- End Priicng -->
                @endif
            @endif
        @endif


        @if ($testimonial->visibility)
            <!-- Testimonials & Clients -->
            <section class="homec-bg-third-color pd-top-120 pd-btm-120 homec-bg-cover homec-bg-testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Section TItle -->
                            <div class="homec-section__head text-center mg-btm-60">
                                <span class="homec-section__badge homec-primary-color homec-section__badge--small m-0"  data-aos="fade-in" data-aos-delay="300">{{ $testimonial->title }}</span>
                                <h2 class="homec-section__title"  data-aos="fade-in" data-aos-delay="400">{{ $testimonial->description }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Testimonial Slider -->
                            <div class="swiper mySwiper homec-slider-testimonial loading">
                                <div class="swiper-wrapper">
                                    @foreach ($testimonial->testimonials as $testimonial_item)
                                        <div class="swiper-slide">
                                            <!-- Testimonial Single -->
                                            <div class="homec-testimonial homec-border">
                                                <!-- Author Rating -->
                                                <ul class="homec-rating list-none mg-btm-15">
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                </ul>
                                                <!-- Testimonial Text -->
                                                <p class="homec-testimonial__text">“{{ $testimonial_item->comment }}”</p>
                                                <div class="homec-testimonial__bottom mg-top-10">
                                                    <!-- Testimonial Author -->
                                                    <div class="homec-testimonial__author">
                                                        <img src="{{ asset($testimonial_item->image) }}" alt="image">
                                                        <div class="homec-testimonial__author--info">
                                                            <h5 class="homec-testimonial__author--title">{{ $testimonial_item->name }}</h5>
                                                            <p class="homec-testimonial__author--position">{{ $testimonial_item->designation }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- Testimonial Quoute Icon -->
                                                    <div class="homec-testimonial__quote">
                                                        <svg width="153" height="108" viewBox="0 0 153 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g opacity="0.1">
                                                            <path d="M31.9633 67.8044C32.2714 71.1357 32.0357 80.1918 23.3603 92.7847C22.704 93.735 22.8231 95.0167 23.638 95.8314C27.175 99.3684 29.3649 101.6 30.9008 103.162C32.9205 105.221 33.8425 106.16 35.1921 107.383C36.0931 108.193 37.4565 108.207 38.3671 107.413C53.4884 94.2555 70.2837 67.0666 67.8534 33.7562C66.4293 14.1969 52.1623 2.42806e-05 33.9312 2.58744e-05C15.2218 2.751e-05 2.24064e-05 15.2194 2.40421e-05 33.9291C2.562e-05 51.978 14.1663 66.7795 31.9633 67.8044ZM33.9312 4.78132C49.5874 4.78132 61.8464 17.1128 63.0859 34.1017C63.0859 34.1017 63.0859 34.1017 63.0859 34.1041C65.8199 71.5677 43.55 95.9014 36.8215 102.345C36.1655 101.698 35.4161 100.937 34.3118 99.8121C32.9812 98.458 31.16 96.6043 28.4053 93.84C38.9368 77.6144 36.9499 66.0535 36.0792 64.3958C35.6659 63.609 34.8184 63.079 33.9312 63.079C17.8575 63.079 4.78133 50.0029 4.78132 33.9291C4.78132 17.8575 17.8575 4.78132 33.9312 4.78132Z"/>
                                                            <path d="M116.868 67.8043C117.179 71.1264 116.95 80.1755 108.265 92.7847C107.612 93.735 107.728 95.0166 108.543 95.8314C112.073 99.3614 114.261 101.591 115.795 103.153C117.821 105.217 118.746 106.158 120.095 107.383C120.996 108.193 122.36 108.205 123.27 107.416C138.391 94.2578 155.189 67.0735 152.763 33.7562L152.763 33.7538C151.334 14.1969 137.065 -6.23648e-06 118.834 -4.64267e-06C100.125 -3.00702e-06 84.9028 15.2194 84.9028 33.9291C84.9028 51.9801 99.0693 66.784 116.868 67.8043ZM118.834 4.7813C134.488 4.7813 146.754 17.1127 147.996 34.1041L147.996 34.1017C150.723 71.5746 128.453 95.9038 121.725 102.345C121.066 101.698 120.314 100.933 119.208 99.8049C117.879 98.4508 116.061 96.5995 113.31 93.84C123.842 77.612 121.855 66.0534 120.984 64.3981C120.571 63.6114 119.721 63.079 118.834 63.079C102.76 63.079 89.6841 50.0028 89.6841 33.9291C89.6841 17.8574 102.76 4.7813 118.834 4.7813Z"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Testimonial Single -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Testimonial Slider -->
                        </div>
                    </div>

                    @if ($partner->visibility)
                    <div class="row mg-top-50">
                        <div class="col-12">
                            <h4 class="homec-medium-title text-center mg-btm-30">{{ $partner->title }}</h4>
                            <!-- Clients Logo Slider -->
                            <div class="swiper mySwiper homec-slider-client loading">
                                <div class="swiper-wrapper">
                                    @foreach ($partner->partners as $partner_item)
                                        <div class="swiper-slide">
                                            <div class="homec-cl-logo">
                                                <a href="{{ $partner_item->link }}"><img src="{{ asset($partner_item->logo) }}" alt="Client Logo"></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Clients Logo Slider -->
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <!-- End Testimonials & Clients -->
        @endif

        @if ($mobile_app->visibility)
		<!-- Download App -->
		<section class="download-app homec-bg-cover homec-bg-primary-color pd-top-15 pd-btm-15" style="background-image:url({{ asset($mobile_app->app_bg) }})">
			<div class="homec-shape">
				<div class="homec-shape-single homec-shape-11"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="#"></div>
				<div class="homec-shape-single homec-shape-12"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="#"></div>
				<div class="homec-shape-single homec-shape-13"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="#"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="download-app__middle">
							<div class="download-app__content">
								<div class="homec-section__head section-white mg-btm-30" data-aos="fade-up" data-aos-delay="400">
									<h2 class="homec-section__title">{{ $mobile_app->full_title }}</h2>
                                    <p class="sec-head__text">{{ $mobile_app->description }}</p>
								</div>
								<!-- App Download Button -->
								<div class="download__app-button" data-aos="fade-up" data-aos-delay="500">
									<a href="{{ $mobile_app->app_store }}" class="homec-btn homec-btn-primary-overlay homec-btn__download">
                                        <div class="homec-btn__inside">
                                            <i class="fa-brands fa-apple"></i>
                                            <div class="btn-content"><span>{{ $mobile_app->apple_btn_text1 }}</span><p>{{ $mobile_app->apple_btn_text2 }}</p></div>
                                        </div>
                                    </a>
									<a href="{{ $mobile_app->play_store }}" class="homec-btn homec-btn-primary-overlay homec-btn__download">
                                        <div class="homec-btn__inside">
                                            <i class="fa-brands fa-google-play"></i>
                                            <div class="btn-content"><span>{{ $mobile_app->google_btn_text1 }}</span><p>{{ $mobile_app->google_btn_text2 }}</p></div>
                                        </div>
                                    </a>
								</div>
								<!-- End App Download Button -->
							</div>
							<!-- Download Image -->
							<div class="download-app__img" data-aos="fade-up" data-aos-delay="700">
								<img src="{{ asset($mobile_app->image) }}" alt="mobile_app">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Download App -->
        @endif

        @if ($blog->visibility)
		<!-- Blog Area -->
		<section id="blog" class="blog-area homec-bg-cover section-padding homec-blog-bg">
			<div class="blog-bg-pattern">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
							<div class="homec-section__head text-center mg-btm-30">
								<span class="homec-section__badge homec-primary-color homec-section__badge--small m-0" data-aos="fade-in" data-aos-delay="300">{{ $blog->title }} </span>
								<h2 class="homec-section__title" data-aos="fade-in" data-aos-delay="400">{{ $blog->description }}</h2>
							</div>
						</div>
					</div>
					<div class="row">
                        @foreach ($blog->blogs as $blog_index => $single_blog)
                            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                                <!-- Single Blog -->
                                <div class="homec-blog">
                                    <div class="homec-blog__head">
                                        <div class="homec-overlay homec-blog__overlay"></div>
                                        <a href="{{ route('blog', $single_blog->slug) }}"><img src="{{ asset($single_blog->image) }}" alt="#"></a>
                                        <!-- Blog Content -->
                                        <div class="homec-blog__content">
                                            <ul class="homec-blog__meta list-none">
                                                <li>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.8182 12.3637H8.36367V13.8182H9.8182V12.3637Z" />
                                                        <path d="M9.8182 9.81816H8.36367V11.2727H9.8182V9.81816Z" />
                                                        <path d="M7.63637 7.27266H6.18184V8.72719H7.63637V7.27266Z" />
                                                        <path d="M7.63637 9.81816H6.18184V11.2727H7.63637V9.81816Z" />
                                                        <path d="M11.9999 9.81816H10.5454V11.2727H11.9999V9.81816Z" />
                                                        <path d="M14.1818 9.81816H12.7272V11.2727H14.1818V9.81816Z" />
                                                        <path d="M14.1818 7.27266H12.7272V8.72719H14.1818V7.27266Z" />
                                                        <path d="M11.9999 7.27266H10.5454V8.72719H11.9999V7.27266Z" />
                                                        <path d="M9.8182 7.27266H8.36367V8.72719H9.8182V7.27266Z" />
                                                        <path d="M3.2727 9.81816H1.81816V11.2727H3.2727V9.81816Z" />
                                                        <path d="M3.2727 12.3637H1.81816V13.8182H3.2727V12.3637Z" />
                                                        <path d="M14.5455 1.45453H13.0909V0.363625C13.0909 0.162812 12.9281 0 12.7273 0C12.5264 0 12.3637 0.162812 12.3637 0.363625V1.45453H3.63637V0.363625C3.63637 0.162812 3.47356 0 3.27272 0C3.07187 0 2.90909 0.162812 2.90909 0.363625V1.45453H1.45453C0.651219 1.45453 0 2.10578 0 2.90909V14.5455C0 15.3488 0.651219 16 1.45453 16H14.5454C15.3488 16 16 15.3488 16 14.5455V2.90909C16 2.10578 15.3488 1.45453 14.5455 1.45453ZM15.2727 14.5455C15.2727 14.9471 14.9471 15.2727 14.5454 15.2727H1.45453C1.05287 15.2727 0.72725 14.9471 0.72725 14.5455V5.81819H15.2727V14.5455ZM15.2727 5.09091H0.727281V2.90909C0.727281 2.50744 1.05291 2.18181 1.45456 2.18181H2.90909V3.27272C2.90909 3.47356 3.07191 3.63634 3.27272 3.63634C3.47356 3.63634 3.63634 3.47353 3.63634 3.27272V2.18181H12.3636V3.27272C12.3636 3.47356 12.5264 3.63634 12.7273 3.63634C12.9281 3.63634 13.0909 3.47353 13.0909 3.27272V2.18181H14.5454C14.9471 2.18181 15.2727 2.50744 15.2727 2.90909L15.2727 5.09091Z" />
                                                        <path d="M3.2727 7.27266H1.81816V8.72719H3.2727V7.27266Z" />
                                                        <path d="M7.63637 12.3637H6.18184V13.8182H7.63637V12.3637Z" />
                                                        <path d="M5.45453 12.3637H4V13.8182H5.45453V12.3637Z" />
                                                        <path d="M5.45453 7.27266H4V8.72719H5.45453V7.27266Z" />
                                                        <path d="M5.45453 9.81816H4V11.2727H5.45453V9.81816Z" />
                                                    </svg>
                                                    {{ $single_blog->created_at->format('M d, Y') }}
                                                </li>
                                                <li class="active">
                                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.60687 8.64356C8.67386 8.64356 9.59767 8.26087 10.3527 7.50584C11.1075 6.75093 11.4903 5.82724 11.4903 4.76013C11.4903 3.69339 11.1076 2.76958 10.3526 2.01443C9.59755 1.25964 8.67374 0.876953 7.60687 0.876953C6.53976 0.876953 5.61608 1.25964 4.86117 2.01455C4.10626 2.76946 3.72345 3.69327 3.72345 4.76013C3.72345 5.82724 4.10626 6.75105 4.86117 7.50596C5.61633 8.26075 6.54013 8.64356 7.60687 8.64356ZM5.52936 2.68262C6.10861 2.10336 6.78812 1.82179 7.60687 1.82179C8.42551 1.82179 9.10514 2.10336 9.68451 2.68262C10.2638 3.26199 10.5455 3.94162 10.5455 4.76013C10.5455 5.57889 10.2638 6.25839 9.68451 6.83777C9.10514 7.41715 8.42551 7.69872 7.60687 7.69872C6.78837 7.69872 6.10886 7.41702 5.52936 6.83777C4.94998 6.25852 4.66829 5.57889 4.66829 4.76013C4.66829 3.94162 4.94998 3.26199 5.52936 2.68262Z"/>
                                                        <path d="M14.4018 13.275C14.3801 12.9609 14.336 12.6182 14.2712 12.2563C14.2057 11.8917 14.1215 11.547 14.0206 11.232C13.9163 10.9064 13.7747 10.5848 13.5994 10.2767C13.4177 9.95684 13.2042 9.67835 12.9646 9.44918C12.714 9.20944 12.4072 9.01668 12.0525 8.87608C11.6989 8.73622 11.3071 8.66536 10.888 8.66536C10.7235 8.66536 10.5643 8.73289 10.2569 8.93303C10.0677 9.05641 9.84639 9.1991 9.59939 9.35692C9.38818 9.4915 9.10206 9.61758 8.74865 9.73174C8.40386 9.84331 8.05377 9.89989 7.70811 9.89989C7.3627 9.89989 7.01261 9.84331 6.66757 9.73174C6.31453 9.61771 6.02829 9.49162 5.81745 9.35705C5.57278 9.2007 5.35136 9.05801 5.15935 8.93291C4.85219 8.73277 4.69301 8.66524 4.52843 8.66524C4.10921 8.66524 3.71755 8.73622 3.36414 8.8762C3.00962 9.01656 2.70271 9.20931 2.4519 9.4493C2.21227 9.6786 1.99873 9.95697 1.81716 10.2767C1.64212 10.5848 1.50041 10.9062 1.3961 11.2321C1.29536 11.5471 1.21109 11.8917 1.14565 12.2563C1.0807 12.6177 1.03679 12.9605 1.01502 13.2754C0.993613 13.5833 0.982788 13.9037 0.982788 14.2275C0.982788 15.0691 1.25033 15.7505 1.77792 16.253C2.29899 16.7488 2.98834 17.0003 3.8269 17.0003H11.5903C12.4286 17.0003 13.118 16.7488 13.6392 16.253C14.1669 15.7509 14.4344 15.0693 14.4344 14.2274C14.4343 13.9025 14.4233 13.5821 14.4018 13.275ZM12.9877 15.5684C12.6434 15.8961 12.1863 16.0554 11.5902 16.0554H3.8269C3.23067 16.0554 2.77357 15.8961 2.42939 15.5686C2.09172 15.2471 1.92763 14.8084 1.92763 14.2275C1.92763 13.9254 1.93759 13.6271 1.95752 13.3407C1.97695 13.0598 2.01669 12.7511 2.07561 12.4232C2.13379 12.0993 2.20784 11.7954 2.29592 11.5202C2.38043 11.2563 2.49569 10.995 2.63863 10.7434C2.77504 10.5035 2.932 10.2977 3.1052 10.1319C3.26721 9.97677 3.4714 9.84983 3.71201 9.75462C3.93454 9.66654 4.18461 9.61832 4.4561 9.61106C4.48919 9.62865 4.54811 9.66223 4.64356 9.72448C4.8378 9.85106 5.06168 9.99547 5.30917 10.1535C5.58816 10.3314 5.94759 10.4921 6.37702 10.6307C6.81604 10.7726 7.2638 10.8447 7.70824 10.8447C8.15267 10.8447 8.60055 10.7726 9.03933 10.6308C9.46912 10.4919 9.82843 10.3314 10.1078 10.1533C10.3611 9.99141 10.5787 9.85118 10.7729 9.72448C10.8684 9.66236 10.9273 9.62865 10.9604 9.61106C11.232 9.61832 11.4821 9.66654 11.7047 9.75462C11.9452 9.84983 12.1494 9.9769 12.3114 10.1319C12.4846 10.2976 12.6416 10.5034 12.778 10.7435C12.921 10.995 13.0364 11.2564 13.1208 11.5201C13.209 11.7956 13.2832 12.0994 13.3412 12.4231C13.4 12.7516 13.4399 13.0604 13.4593 13.3408C13.4794 13.6261 13.4895 13.9245 13.4896 14.2275C13.4895 14.8085 13.3254 15.2471 12.9877 15.5684Z"/>
                                                    </svg>
                                                    <a href="javascript:;">{{ $single_blog->admin->name }}</a>
                                                </li>
                                            </ul>
                                            <h3 class="homec-blog__title"><a href="{{ route('blog', $single_blog->slug) }}">{{ $single_blog->title }}</a></h3>
                                            <div class="home-blog__button homec-border-top">
                                                <a href="{{ route('blog', $single_blog->slug) }}" class="homec-blog__btn">{{__('user.Read More')}}
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 8L16 12M16 12L12 16M16 12H2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9 18.2454C10.3696 19.3433 12.1081 20 14 20C18.4183 20 22 16.4183 22 12C22 7.58172 18.4183 4 14 4C12.1081 4 10.3696 4.65672 9 5.75462" stroke-width="1.5" stroke-linecap="round"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Blog -->
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog Area -->
        @endif
@endsection
