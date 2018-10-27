@section('title', 'Login Panel')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
	<div class="container lower">
		<div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Visi
                                </div>
                                <div class="circle-tile-number text-faded">
                                    Administratoriai
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="{{ route('users.index') }}" class="circle-tile-footer"> Daugiau informacijos <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Visi
                                </div>
                                <div class="circle-tile-number text-faded">
                                    Mentoriai
                                </div>
                                <a href="{{ route('mentors.index') }}" class="circle-tile-footer">Daugiau informacijos <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                                <div class="circle-tile-heading orange-bg">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            <div class="circle-tile-content orange-bg">
                                <div class="circle-tile-description text-faded">
                                    Visi
                                </div>
                                <div class="circle-tile-number text-faded">
                                    Studentai
                                </div>
                                <a href="{{ route('students.index') }}" class="circle-tile-footer">Daugiau informacijos <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-cog fa-fw fa-3x"></i>
                                </div>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Keisti
                                </div>
                                <div class="circle-tile-number text-faded">
                                    Informaciją
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="/users/{{ Auth::guard('web')->user()['id'] }}/edit" class="circle-tile-footer">Daugiau informacijos <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-cog fa-fw fa-3x"></i>
                                </div>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Keisti
                                </div>
                                <div class="circle-tile-number text-faded">
                                    Slaptažodį
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="{{ route('users.changePassword') }}" class="circle-tile-footer">Daugiau informacijos <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
          	 </div>