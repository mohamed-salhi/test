<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Categories
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.categories.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.categories.create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Create</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Tags
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.tags.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Tags</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.tags.create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Create</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Post
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.posts.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.posts.create')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Create</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="./docs/introduction.html" class="nav-link">
                    <i class="nav-icon bi bi-download"></i>
                    <p>Installation</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="./docs/introduction.html" class="nav-link">
                    <i class="nav-icon bi bi-download"></i>
                    <form method="post" action="{{route('admin.logout')}}">
                        @csrf
                        <button type="submit">logout</button>
                    </form>                </a>
            </li>

        </ul>
        <!--end::Sidebar Menu-->
    </nav>
</div>
