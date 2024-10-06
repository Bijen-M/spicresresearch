<section id="vcSidebar" class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ 'backend/images/student-'.auth()->user()->gender.'.jpg' }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }} 
                            <span class="user-level">{{ auth()->user()->email }} </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
<!--                            <li>
                                <a href="#">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>-->
                            <li>
                                <a href="{{ route('admin.change.password') }}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $ss = request()->segment(2) ?>
            <ul class="nav icofontSize">
                <li class="nav-item {{ $ss == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icofont-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ $ss == 'user' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="icofont-users-alt-3"></i>
                        <p>Users</p>
                    </a>
                </li>
<!--                <li class="nav-item">
                    <a href="#">
                        <i class="icofont-cubes"></i>
                        <p>Departments</p>
                    </a>
                </li>-->
<!--                <li class="nav-item">
                    <a href="{{-- route('image.index') --}}">
                        <i class="icofont-image"></i>
                        <p>Images</p>
                    </a>
                </li>-->
                <li class="nav-item {{ $ss == 'banner' ? 'active' : '' }}">
                    <a href="{{ route('banner.index') }}">
                        <i class="icofont-imac"></i>
                        <p>Banners</p>
                    </a>
                </li>
                <li class="nav-item {{ $ss == 'page' ? 'active' : '' }}">
                    <a href="{{ route('page.index') }}">
                        <i class="icofont-page"></i>
                        <p>Pages</p>
                    </a>
                </li>
                <li class="nav-item {{ $ss == 'service' ? 'active' : '' }}">
                    <a href="{{ route('service.index') }}">
                        <i class="icofont-paper-plane"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item {{ ($ss == 'blog' || $ss == 'category' || $ss == 'tag') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#base">
                        <i class="icofont-blogger"></i>
                        <p>Blogs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ ($ss == 'blog' || $ss == 'category' || $ss == 'tag') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ $ss == 'blog' ? 'active' : '' }}">
                                <a href="{{ route('blog.index') }}">
                                    <span class="sub-item">
                                        <i class="icofont-listing-box"></i> <p>All Blogs</p>
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $ss == 'category' ? 'active' : '' }}">
                                <a href="{{ route('category.index') }}">
                                    <span class="sub-item">
                                        <i class="icofont-layers"></i> <p>Categories</p>
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $ss == 'tag' ? 'active' : '' }}">
                                <a href="{{ route('tag.index') }}">
                                    <span class="sub-item">
                                        <i class="icofont-tags"></i> <p>Tags</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ $ss == 'portfolio' ? 'active' : '' }}">
                    <a href="{{ route('portfolio.index') }}">
                        <i class="icofont-address-book"></i>
                        <p>Portfolios</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'testimonial' ? 'active' : '' }}">
                    <a href="{{ route('testimonial.index') }}">
                        <i class="icofont-comment"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'team' ? 'active' : '' }}">
                    <a href="{{ route('team.index') }}">
                        <i class="icofont-users-alt-5"></i>
                        <p>Teams</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'why-choose-us' ? 'active' : '' }}">
                    <a href="{{ route('why-choose-us.index') }}">
                        <i class="icofont-paper-plane"></i>
                        <p>Why Choose Us</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'menu' ? 'active' : '' }}">
                    <a href="{{ route('menu.index') }}">
                        <i class="icofont-navigation-menu"></i>
                        <p>Menus</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'news-letter' ? 'active' : '' }}">
                        <a href="{{ route('news-letter.index') }}">
                        <i class="icofont-email"></i>
                        <p>News Latter</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'subscribe' ? 'active' : '' }}">
                        <a href="{{ route('subscribe.index') }}">
                        <i class="icofont-users-social"></i>
                        <p>Subscribes</p>
                    </a>
                </li>
                
                <li class="nav-item {{ $ss == 'settings' ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="icofont-ui-settings"></i>
                        <p>Settings</p>
                    </a>
                </li>
                
                <!--<li class="nav-item active">
                    <a href="#">
                        <i class="icofont-home"></i>
                        <p>Dashboard</p>
                        <span class="badge badge-count">5</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="icofont-layers"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>-->

            </ul>

        </div>
    </div>
</section>