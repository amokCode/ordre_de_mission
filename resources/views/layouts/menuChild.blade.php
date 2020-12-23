<li class="menu-title">
    <span>Main</span>
</li>
<li class="submenu">
    <a href="#" class="{{ Request::is('mission*') ? 'active font-weight-bold' : '' }}"><i class="fa fa-file-text-o"></i> <span> Missions</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a class="item-nav {{ Route::currentRouteName() == 'mission.create' ? 'bg-primary-light font-weight-bold' : '' }}" href="{{ route('mission.create') }}">Ajouter</a></li>
        <li><a class="item-nav {{ Route::currentRouteName() == 'mission.create' ? 'bg-primary-light font-weight-bold' : '' }}" href="{{ route('mission.index') }}">Liste</a></li>
    </ul>
</li>
