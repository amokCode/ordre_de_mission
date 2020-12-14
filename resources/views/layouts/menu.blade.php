<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="#"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="fe fe-cart"></i> <span> Elements</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="item-nav" href="{{ route('element.create') }}">Ajouter</a></li>
                        <li><a class="item-nav" href="{{ route('element.index') }}">Liste</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="#"><i class="fe fe-cart"></i> <span> Mission</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="item-nav" href="{{ route('mission.create') }}">Ajouter</a></li>
                        <li><a class="item-nav" href="{{ route('mission.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
