
@can(['inventory import'])
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.inventory.import','admin.inventory.list']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >
        <i class="nav-icon fa fa-upload" style="font-size:14px"></i>

        <p>
            Inventories Import
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @can('inventory import')
            <a href="{{route('admin.inventory.import')}}" class="nav-link {{ Route::currentRouteName() === 'admin.inventory.import' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Vehicle Import</p>
            </a>
            @endcan
        </li>
        <li class="nav-item">
            @can('inventory import')
            <a href="{{route('admin.inventory.list')}}" class="nav-link {{ Route::currentRouteName() === 'admin.inventory.list' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Inventory List</p>
            </a>
            @endcan
        </li>
    </ul>
</li>
@endcan


@role('admin')

<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.users']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >
        <i class='nav-icon fa fa-users' style="font-size:14px"></i>
        <p>
            Users Management
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link {{ Route::currentRouteName() === 'admin.users' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Users</p>
            </a>
        </li>
        {{--<li class="nav-item">
            <a href="{{route('admin.dealer.manage')}}" class="nav-link {{ Route::currentRouteName() === 'admin.dealer.manage' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p> Dealers</p>
            </a>
        </li>--}}


    </ul>
</li>
<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.membership']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >
        
        <i class="fa fa-landmark nav-icon" style="font-size:14px"></i>
        <p>
            Membership
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.membership')}}" class="nav-link {{ Route::currentRouteName() === 'admin.membership' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Membership</p>
            </a>
        </li>
        {{--<li class="nav-item">
            <a href="{{route('admin.dealer.manage')}}" class="nav-link {{ Route::currentRouteName() === 'admin.dealer.manage' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p> Dealers</p>
            </a>
        </li>--}}


    </ul>
</li>



<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.makes.index', 'admin.models.index', 'admin.years.index', 'admin.trims.index', 'admin.body.index']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >


        <i class="fa fa-car nav-icon" style="font-size:14px"></i>

        <p>
            Inventories Feature
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.years.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.years.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Vehicle Year</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.makes.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.makes.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Vehicle Make</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.models.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.models.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Vehicle Model</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.trims.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.trims.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Vehicle Trim</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.body.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.body.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Vehicle Body</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.makes.index', 'admin.models.index', 'admin.years.index', 'admin.trims.index', 'admin.body.index']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >


        <i class="fa fa-car nav-icon" style="font-size:14px"></i>

        <p>
            Request Inventories 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.req.inventory')}}" class="nav-link {{ Route::currentRouteName() === 'admin.req.inventory' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Request Inventories</p>
            </a>
        </li>
        


    </ul>
</li>


<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.states.index','admin.cities.index','admin.zips.index']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >
        <i class='nav-icon fa fa-map-marker' style="font-size:14px" aria-hidden="true"></i>
        <p>
            Location Management
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.states.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.states.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>States</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.cities.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.cities.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Cities</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.zips.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.zips.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Zip Codes</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.contact.show', 'admin.subscriber.show','admin.user.track.history']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('admin.lead.show')}}" class="nav-link ">


        <i class="fa fa-layer-group nav-icon" style="font-size:14px"></i>

        <p>
            Others
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.contact.show']) ? 'active ' : '' }}">

            <a href="{{route('admin.contact.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.contact.show' ? 'active' : '' }}" >

                <i class="fa fa-address-book nav-icon" style="font-size:14px"></i>

                <p>
                    Contact Message

                </p>
            </a>

        </li>

        <li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.subscriber.show']) ? 'active menu-is-opening menu-open' : '' }}">
            <a href="{{route('admin.subscriber.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.subscriber.show' ? 'active' : '' }}" >

                <i class="fa fa-address-book nav-icon" style="font-size:14px"></i>

                <p>
                   Subscribers

                </p>
            </a>

        </li>

        <li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.user.track.history']) ? 'active menu-is-opening menu-open' : '' }}">
            <a href="{{route('admin.user.track.history')}}" class="nav-link {{ Route::currentRouteName() === 'admin.user.track.history' ? 'active' : '' }}" >

                <i class="fa fa-address-book nav-icon" style="font-size:14px"></i>

                <p>
                  Tracking History

                </p>
            </a>

        </li>
    </ul>

</li>

<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.lead.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('admin.lead.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.lead.show' ? 'active' : '' }}" >

        <i class="fa fa-newspaper nav-icon" style="font-size:14px"></i>

        @php
        $unreadLead = App\Models\Lead::where('status', '0')->count();
        @endphp
        <p>Leads <span class="badge bg-warning">{{$unreadLead}}</span></p>
    </a>

</li>

<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.invoice.list']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('admin.invoice.list')}}" class="nav-link {{ Route::currentRouteName() === 'admin.invoice.list' ? 'active' : '' }}" >

        <i class="fa fa-book nav-icon" style="font-size:14px"></i>
        <p>
            Invoices

        </p>
    </a>

</li>
@endrole

@role(['dealer','admin'])


@role('dealer')
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['dealer.profile']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('dealer.profile')}}" class="nav-link ">

        <i class="fa fa-book nav-icon" style="font-size:14px"></i>

        <p>
            Profile

        </p>
    </a>

</li>

<li class="nav-item  {{ in_array(Route::currentRouteName(), ['dealer.lead.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('dealer.lead.show')}}" class="nav-link " >

        <i class="fa fa-book nav-icon" style="font-size:14px"></i>

        <p>
            Leads

        </p>
    </a>

</li>

<li class="nav-item  {{ in_array(Route::currentRouteName(), ['dealer.invoice.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="{{route('dealer.invoice.show')}}" class="nav-link " >

        <i class="fa fa-book nav-icon" style="font-size:14px"></i>

        <p>
            Invoices

        </p>
    </a>

</li>
@endrole
@endrole





@hasrole(['editor','admin'])
<div class="pb-3 mt-3 mb-3 user-panel d-flex">
    <div class="image">

    </div>
    <div class="info">
        <a href="#" class="d-block">Frontend Management</a>
    </div>
</div>



<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.frontend.add.seo']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">
        <i class="fa fa-paperclip  nav-icon"  style="font-size:14px"></i>


        <p>
            Meta Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.frontend.add.seo')}}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.add.seo' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Add Meta</p>
            </a>
        </li>


    </ul>
</li>


<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.banner.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">

        <i class="fa fa-square nav-icon" style="font-size:14px"></i>


        <p>
            Banner Management
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{route('admin.banner.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.banner.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Banner</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.banner.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">

        <i class="fa fa-square nav-icon" style="font-size:14px"></i>


        <p>
            Tending Search
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{route('admin.tending.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.tending.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Tending</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.banner.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">

        <i class="fa fa-square nav-icon" style="font-size:14px"></i>


        <p>
            Latest Video
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{route('admin.video.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.video.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Video</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.frontend.menu.index','admin.frontend.footer.index']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">
        <i class=" nav-icon fa fa-sliders"  style="font-size:14px"></i>

        <p>
            Menu Management
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{route('admin.frontend.menu.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.menu.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Top Menu</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.frontend.footer.index')}}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.footer.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>Footer Menu </p>
            </a>
        </li>
    </ul>
</li>




<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.frontend.all.page','admin.frontend.add.page','admin.news.show','admin.faq.show','admin.terms.condition','admin.advertisement.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">

        <i class=" nav-icon fa fa-bookmark"  style="font-size:14px"></i>

        <p>
            Page Management
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.frontend.all.page')}}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.all.page' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>All Pages</p>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.frontend.add.page']) ? 'active' : '' }}">
            <a href="{{route('admin.frontend.add.page')}}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.add.page' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p> Custom Page</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.news.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.news.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >News </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.review.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.review.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Reviews </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.tips.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.tips.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Tips </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.blog.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.blog.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Research Article </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.faq.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.faq.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >FAQ </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.terms.condition')}}" class="nav-link {{ Route::currentRouteName() === 'admin.terms.condition' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Terms & Condition</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.advertisement.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.advertisement.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Ads</p>
            </a>
        </li>


    </ul>
</li>


<li class="nav-item  {{ in_array(Route::currentRouteName(), ['admin.links.show']) ? 'active menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link " >

        <i class="nav-icon fa fa-play" style="font-size:14px"></i>
        <p>
            Social Media
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.links.show')}}" class="nav-link {{ Route::currentRouteName() === 'admin.links.show' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p >Media </p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.roles.index','admin.permission','admin.frontend.logo.index']) ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-gear" style="font-size:14px"></i>
        <p>
            Settings
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.roles.index','admin.permission']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>
                    Role
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::currentRouteName() === 'admin.roles.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                        <p>Role & Permission</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permission') }}" class="nav-link {{ Route::currentRouteName() === 'admin.permission' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                        <p>Permission List</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.frontend.logo.index']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon" style="font-size:12px"></i>
                <p>
                    General
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.frontend.logo.index']) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('admin.frontend.logo.index') }}" class="nav-link {{ Route::currentRouteName() === 'admin.frontend.logo.index' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-sliders" style="font-size:14px"></i>
                        <p>General Setting</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</li>

@endhasrole