<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<style>
     :root {
        --white: #FFFFFF;
        --sidebar-primary-hover: #EBEFFD;
        --sidebar-bg: #fff;
        --bg: #dbdbdb;
        --text: #808183;
        --text-headline: #1f1f1f;
        --text-link: #f9fafc;
        --expand-button: #f6f6f6;
        --search-bg: #f6f6f6;
        --separator: #1e1f21;
        --link-text: #454545;
        --link-hover: #f6f6f6;
        --toolkit-bg: #151515;
        --toolkit-text: #f6f6f6;
        --alarm: #ee461e;
        --green: #aeeadb;
        --green-dark: #a3d6c7;
        --violet: #cad2f6;
        --violet-dark: #c2c7e1;
        --purple: #e4c5f4;
        --purple-dark: #d5bddd;
        --text-dark: #151515;
        --text-gray: #929292;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        padding: 1rem;
        height: 100%;
        background: var(--bg);
    }
    
    html {
        height: 100%;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .sidebar {
        position: fixed;
        top: 1rem;
        left: 1rem;
        min-height: 100vh;
        height: 100vh;
        padding: 1rem;
        border-radius: 0.75rem;
        max-width: 18rem;
        min-width: 4rem;
        display: flex;
        color: var(--white);
        flex-direction: column;
        background-color: var(--sidebar-bg);
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        transition: max-width 0.2s ease-in-out;
    }
    
    .sidebar .scrolled {
        height: 100vh;
        overflow-y: auto;
    }
    
    body.collapsed .sidebar {
        max-width: 7rem;
        display: flex;
    }
    
    body.collapsed .main {
        margin-left: 9rem;
        display: flex;
    }
    
    body.collapsed .hide {
        position: absolute;
        visibility: hidden;
    }
    
    .separator {
        width: 100%;
        height: 0.25px;
        margin-top: 1rem;
        margin-bottom: 1rem;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
    }
    
    .separator--top {
        margin-top: auto;
    }
    
    .search__wrapper {
        position: relative;
        margin-top: 1.25rem;
    }
    
    .search__wrapper input {
        background: var(--search-bg);
        min-height: 2.6rem;
        width: 100%;
        color: var(--text);
        border-radius: 0.75rem;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0) 0px 0px 1px 0px;
        padding-left: 2.15rem;
        font-size: 1.1rem;
        border: none;
    }
    
    body.collapsed .search__wrapper {
        background: var(--search-bg);
        border-radius: 0.75rem;
    }
    
    .search__wrapper input::placeholder {
        color: var(--text);
        font-size: 1.1rem;
    }
    
    body.collapsed .search__wrapper input {
        background: transparent;
        box-shadow: none;
    }
    
    body.collapsed .search__wrapper input::placeholder {
        color: transparent;
    }
    
    .search__wrapper input:focus {
        outline: 1px solid var(--text-gray);
    }
    
    .search__wrapper svg {
        position: absolute;
        z-index: 2;
        top: 50%;
        left: 0.9rem;
        width: 1.4rem;
        height: 1.4rem;
        stroke: blue;
        stroke-width: 0.5;
        transform: translateY(-50%);
        pointer-events: none;
        cursor: pointer;
        padding: 2px;
    }
    
    .sidebar-top-wrapper {
        display: flex;
    }
    
    .sidebar-top {
        position: relative;
        display: flex;
        align-items: start;
        justify-content: center;
        flex-direction: column;
        overflow: hidden;
        height: 4rem;
        padding-bottom: 1rem;
    }
    
    .sidebar-top__company {
        display: flex;
        gap: 0.25rem;
        flex-direction: column;
    }
    
    .company-name {
        font-size: 1.25rem;
        color: var(--text-headline);
    }
    
    .company-members {
        font-size: 1rem;
        color: var(--text);
        font-weight: 600;
    }
    
    .logo__wrapper {
        display: flex;
        align-items: center;
        color: var(--text);
        font-weight: 700;
        text-decoration: none;
        font-size: 1.85rem;
        gap: 0.75rem;
    }
    
    .logo-small {
        width: 3rem;
        aspect-ratio: 1/1;
        border-radius: 0.5rem;
        overflow: hidden;
        object-fit: cover;
    }
    
    .company-name {
        white-space: nowrap;
        color: var(--text-headline);
    }
    
    .sidebar-links--top {
        margin-top: 1.5rem;
    }
    
    .sidebar-links ul {
        list-style-type: none;
        position: relative;
        display: flex;
        row-gap: 0.5rem;
        flex-direction: column;
    }
    
    .sidebar-links li {
        color: var(--text-dark);
        min-width: 3rem;
    }
    
    .sidebar-links li .notification {
        background: var(--alarm);
    }
    
    .sidebar-links svg {
        stroke: rgb(72, 72, 255);
        stroke-width: 0.3;
        width: 1.5rem;
        height: 1.5rem;
        min-width: 1.75rem;
        margin-left: 0;
    }
    
    .sidebar-links svg:hover {
        stroke: red;
    }
    
    .sidebar-links li a:hover {
        background: var(--link-hover);
    }
    
    .sidebar-links li a {
        color: var(--text-dark);
        width: 100%;
        padding-left: 0.6rem;
        font-size: 1.1rem;
        display: flex;
        gap: 1rem;
        border-radius: 0.75rem;
        justify-content: start;
        align-items: center;
        min-height: 3rem;
        text-decoration: none;
        transition: background 0.2s ease-in-out;
    }
    
    .sidebar-links li a:focus {
        outline: 1px solid var(--text-dark);
    }
    
    .sidebar-links li a .link {
        overflow: hidden;
        white-space: nowrap;
        animation: fadeIn 0.2s ease-in-out;
    }
    
    .sidebar-links .notification {
        position: absolute;
        top: 0.5rem;
        left: 1.5rem;
        width: 0.6rem;
        height: 0.6rem;
        background: var(--alarm);
        border-radius: 50%;
    }
    
    .sidebar-links .active:hover {
        background: var(--link-hover);
    }
    
    .sidebar-links .active {
        text-decoration: none;
        background: var(--link-hover);
        color: var(--text-dark);
    }
    
    .sidebar-links .active svg {
        stroke: var(--text-dark);
    }
    
    .sidebar-links--bottom {
        margin-top: auto;
    }
    
    .toolkit {
        position: relative;
        z-index: 999;
    }
    
    .toolkit .toolkit__content::after {
        content: " ";
        position: absolute;
        top: 50%;
        left: 0%;
        margin-left: -9px;
        margin-top: -5px;
        border-style: solid;
        border-color: transparent var(--toolkit-bg) transparent transparent;
        z-index: 999;
    }
    
    .toolkit .toolkit__content {
        visibility: hidden;
        background: var(--text-dark);
        color: var(--text-link);
        text-align: center;
        border-radius: 6px;
        white-space: nowrap;
        padding: 0.35rem 0.75rem;
        position: absolute;
        z-index: 999;
        left: 4.5rem;
    }
    
    .collapsed .toolkit:hover .toolkit__content {
        visibility: hidden;
        z-index: 999;
    }
    
    .collapsed .toolkit:focus .toolkit__content {
        visibility: visible;
        z-index: 999;
    }
    
    .sidebar__profile {
        display: flex;
        align-items: center;
        padding-top: 0.5rem;
        gap: 0.75rem;
        flex-direction: row;
        color: var(--text-link);
    }
    
    .avatar__wrapper {
        position: relative;
        display: flex;
    }
    
    .avatar {
        display: block;
        width: 2.6rem;
        height: 2.6rem;
        object-fit: cover;
        cursor: pointer;
        margin: 0 0.15rem;
        margin-bottom: 0.25rem;
        border-radius: 0.5rem;
        transition: outline-offset 0.2s ease;
    }
    
    .avatar__wrapper .online__status {
        position: absolute;
        top: 0.1rem;
        left: 0.1rem;
        height: 0.75rem;
        width: 0.75rem;
        background: var(--online);
        border-radius: 50%;
    }
    
    .avatar:hover {
        outline: 2px solid var(--text-gray);
        outline-offset: 3px;
    }
    
    .avatar__name {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        white-space: nowrap;
    }
    
    .user-name {
        font-weight: 600;
        text-align: left;
        color: var(--text-dark);
    }
    
    .email {
        color: var(--text-gray);
        font-size: 0.8rem;
    }
    
    .profile-menu-button {
        margin-left: auto;
        background: none;
        border: none;
        cursor: pointer;
    }
    
    .profile-menu-button svg {
        color: var(--text-gray);
    }
    
    .expand-btn {
        position: absolute;
        display: grid;
        place-items: center;
        cursor: pointer;
        background: var(--expand-button);
        z-index: 2;
        right: -1rem;
        width: 2.2rem;
        height: 2.2rem;
        border: none;
        border-radius: 50%;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    
    .expand-btn svg {
        transform: rotate(-180deg);
        width: 1rem;
        height: 1rem;
        stroke: var(--text-gray);
        stroke-width: 3;
    }
    
    body.collapsed .expand-btn svg {
        transform: rotate(-360deg);
    }
    
    .routes .route__marker {
        min-width: 1.7rem;
        min-height: 1.25rem;
        display: inline-block;
        border-radius: 0.25rem;
    }
    
    .routes .route__marker--green {
        background: var(--green);
        border: 2px solid var(--green-dark);
    }
    
    .routes .route__marker--violet {
        background: var(--violet);
        border: 2px solid var(--violet-dark);
    }
    
    .routes .route__marker--purple {
        background: var(--purple);
        border: 2px solid var(--purple-dark);
    }
    
    .main {
        background: var(--white);
        margin-left: 20rem;
        padding: 4rem;
        border-radius: 0.75rem;
        transition: margin-left 0.2s ease-in-out;
    }
    
    .user_profile {
        display: flex;
        align-items: center;
        padding-top: 0.5rem;
        gap: 0.75rem;
        flex-direction: row;
        color: var(--text-link);
        width: 100%;
    }
    
    .user_acc-name {
        font-weight: 600;
        text-align: left;
        color: var(--text-dark);
    }
    
    .user_username {
        color: var(--text-gray);
        font-size: 0.8rem;
    }
    
    .user_avatar {
        position: relative;
        display: flex;
    }
    
    .user_details {
        display: flex;
        flex-direction: column;
    }
    
    .post-pic {
        height: 30rem;
        width: 30rem;
        aspect-ratio: 1/1;
        border-radius: 0.5rem;
        overflow: hidden;
        object-fit: cover;
    }
    
    .pic-content {
        border-radius: 0.5rem;
        background: rgb(167, 167, 167);
        margin-top: 1rem;
    }
    
    .main-div {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .up-post {
        display: flex;
    }
    
    .option {
        padding: 1rem;
        width: 100%;
        display: flex;
        justify-content: end;
    }
    
    .post-bars {
        display: flex;
        justify-content: center;
        gap: 2rem;
        padding-top: 0.5rem;
        object-fit: cover;
    }
    
    .comment-bar {
        display: flex;
        justify-content: end;
        padding: 1rem;
        cursor: pointer;
        gap: 0.5rem;
        stroke: gray;
        stroke-width: 1;
    }
    
    .comment-bar:hover {
        background: var(--search-bg);
        border-radius: 0.75rem;
        stroke: blue;
    }
    
    .icon_pic {
        height: 1.4rem;
        width: 1.4rem;
        stroke: blue;
    }
    
    .comment-bar svg {
        height: 1.4rem;
        width: 1.4rem;
    }
    
    .option svg {
        height: 1.8rem;
        width: 1.8rem;
        stroke: var(--text-dark);
        padding: 1px;
    }
    
    .option {
        padding: 3px;
    }
    
    @keyframes fadeIn {
        from {
            width: 4rem;
            opacity: 0;
        }
        to {
            opacity: 1;
            width: 100%;
        }
    }
</style>

<body>
    <nav class="sidebar">
        <div class="sidebar-top-wrapper">
            <div class="sidebar-top">
                <a href="#" class="logo__wrapper">
                    <img src="asset/Screenshot (1).png" alt="logo" class="logo-small">
                    <div class="hidesidebar-top_company hide">
                        <span class="company-name">
                            Market Site
                        </span>
                        <span class="company-members">
                            6.8kmembers
                        </span>
                    </div>
                </a>
            </div>
            <button class="expand-btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <polygon points="24 12 0 0 0 1.092 21.764 12 0 22.879 0 24 24 12"/>
</svg>

            </button>
        </div>
        <div class="search__wrapper">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="512" height="512"><path d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z"/></svg>

            </span>
            <input type="text" placeholder="Search.." aria-labelledby="search-icon">
        </div>
        <div class="sidebar-links sidebar-links--top">
            <ul>
                <li>
                    <a href="index.html" class="toolkit">
                        <span class="route__marker route__marker--purple"></span>
                        <span class="link hide">Dashboard</span>
                        <span class="toolkit__content">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="separator"></div>
        <div class="scrolled">
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--green">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M22.017,5.831l-1.017-.686V1.5c0-.276-.224-.5-.5-.5s-.5,.224-.5,.5v2.97L14.517,.77c-1.529-1.032-3.506-1.031-5.033,0L1.983,5.831c-1.242,.837-1.983,2.232-1.983,3.73v9.939c0,2.481,2.019,4.5,4.5,4.5h3c.276,0,.5-.224,.5-.5V14.5c0-.827,.673-1.5,1.5-1.5h5c.827,0,1.5,.673,1.5,1.5v9c0,.276,.224,.5,.5,.5h3c2.481,0,4.5-2.019,4.5-4.5V9.561c0-1.499-.741-2.893-1.983-3.73Zm.983,13.669c0,1.93-1.57,3.5-3.5,3.5h-2.5V14.5c0-1.378-1.121-2.5-2.5-2.5h-5c-1.379,0-2.5,1.122-2.5,2.5v8.5h-2.5c-1.93,0-3.5-1.57-3.5-3.5V9.561c0-1.166,.576-2.25,1.542-2.901L10.042,1.599c1.189-.803,2.727-.803,3.916,0l7.5,5.061c.966,.651,1.542,1.736,1.542,2.901v9.939Z"/></svg>

                        </span>
                            <span class="link hide">Home</span>
                            <span class="toolkit__content">Home</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--purple">
                                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
  <path d="M18,8c2.206,0,4-1.794,4-4S20.206,0,18,0s-4,1.794-4,4,1.794,4,4,4Zm0-7c1.654,0,3,1.346,3,3s-1.346,3-3,3-3-1.346-3-3,1.346-3,3-3ZM8,11c0,2.206,1.794,4,4,4s4-1.794,4-4-1.794-4-4-4-4,1.794-4,4Zm4-3c1.654,0,3,1.346,3,3s-1.346,3-3,3-3-1.346-3-3,1.346-3,3-3Zm-6,0c2.206,0,4-1.794,4-4S8.206,0,6,0,2,1.794,2,4s1.794,4,4,4Zm0-7c1.654,0,3,1.346,3,3s-1.346,3-3,3-3-1.346-3-3,1.346-3,3-3Zm12,19c0-1.654-1.346-3-3-3h-6c-1.654,0-3,1.346-3,3v3H0v1H24v-1h-6v-3Zm-11,0c0-1.103,.897-2,2-2h6c1.103,0,2,.897,2,2v3H7v-3Zm17-7v4h-1v-4c0-1.103-.897-2-2-2h-3c0-.341-.035-.674-.09-1h3.09c1.654,0,3,1.346,3,3ZM1,17H0v-4c0-1.654,1.346-3,3-3h3.09c-.055,.326-.09,.659-.09,1H3c-1.103,0-2,.897-2,2v4Z"/>
</svg>
    

                        </span>
                            <span class="link hide">Communities</span>
                            <span class="toolkit__content">Communities</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--violet">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <path d="M21.5,0H2.5C1.121,0,0,1.122,0,2.5V24H24V2.5c0-1.378-1.121-2.5-2.5-2.5ZM2.5,1H21.5c.827,0,1.5,.673,1.5,1.5v1.5H1v-1.5c0-.827,.673-1.5,1.5-1.5ZM1,23V5H23V23H1ZM9,9H4v-1h5v1Zm-2,4h7v1H7v-1Zm-3,5H14v1H4v-1Zm15-1.429V8h-4.071c-.224-.86-1-1.5-1.929-1.5-1.103,0-2,.897-2,2s.897,2,2,2c.929,0,1.705-.64,1.929-1.5h3.071v7.571c-.86,.224-1.5,1-1.5,1.929,0,1.103,.897,2,2,2s2-.897,2-2c0-.929-.64-1.705-1.5-1.929Zm-6-7.071c-.552,0-1-.449-1-1s.448-1,1-1,1,.449,1,1-.448,1-1,1Zm5.5,10c-.552,0-1-.448-1-1s.448-1,1-1,1,.448,1,1-.448,1-1,1Z"/>
</svg>
                        </span>
                            <span class="link hide">Projects</span>
                            <span class="toolkit__content">Projects</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--violet">
                               <img src="asset/hooks.png" alt="" class="icon_pic">
                        </span>
                            <span class="link hide">Panel</span>
                            <span class="toolkit__content">Panel</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--violet">
                               <img src="asset/hooks.png" alt="" class="icon_pic">
                        </span>
                            <span class="link hide">Hooked</span>
                            <span class="toolkit__content">Hooked</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--violet">
                          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M21.5,2H2.5C1.12,2,0,3.12,0,4.5V22H24V4.5c0-1.38-1.12-2.5-2.5-2.5ZM2.5,3H21.5c.83,0,1.5,.67,1.5,1.5v2.5H1v-2.5c0-.83,.67-1.5,1.5-1.5ZM1,21V8H23v13H1Zm3-10h7v1h-3v6h-1v-6h-3v-1Zm9,0h7v1h-7v-1Zm0,4h7v1h-7v-1Z"/></svg>

                        </span>
                            <span class="link hide">Posts</span>
                            <span class="toolkit__content">Posts</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="sidebar-links sidebar-links--gray">
                <ul>
                    <li>
                        <a href="#home" class="toolkit">
                            <span class="route__marker route__marker--violet">
                              <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <path d="M21.5,2H2.5C1.122,2,0,3.122,0,4.5V22H24V4.5c0-1.378-1.122-2.5-2.5-2.5ZM2.5,3H21.5c.534,0,1,.282,1.266,.703L14.494,11.975c-.662,.661-1.54,1.025-2.479,1.025h-.017c-.914-.017-1.826-.36-2.492-1.025L1.234,3.703c.266-.421,.732-.703,1.266-.703ZM1,21V4.883l7.799,7.799c.851,.851,1.98,1.318,3.177,1.318h.044c1.202,0,2.331-.467,3.182-1.318l7.799-7.799V21H1Z"/>
</svg>
                        </span>
                            <span class="link hide">Messages</span>
                            <span class="toolkit__content">Messages</span>

                        </a>
                    </li>
                </ul>
            </div>
            <div class="separator"></div>

            <div class="sidebar__profile">
                <div class="avatar__wrapper">
                    <img src="asset/Screenshot (1).png" alt="avatar" class="avatar">
                    <div class="online__status"></div>
                </div>
                <div class="avatar__name hide">
                    <div class="user-name">John Doe</div>
                    <div class="email">John@gmail.com</div>
                </div>
                <button class="profile-menu-button">
                <!--svg icon-->
            </button>
            </div>

        </div>
    </nav>
    <div class="main-div">
        <div class="main">
            <div class="post">
                <div class="up-post">
                    <div class="user_profile">
                        <div class="user_avatar">
                            <img src="asset/Screenshot (1).png" alt="" class="avatar">
                        </div>
                        <div class="user_details">
                            <div class="user_acc-name">John Doe</div>
                            <div class="user_username">@john_doe</div>
                        </div>


                    </div>
                    <div class="option">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <path d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm0,23c-6.065,0-11-4.935-11-11S5.935,1,12,1s11,4.935,11,11-4.935,11-11,11Zm1-17c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Zm0,12c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Zm0-6c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Z"/>
</svg>
                    </div>
                </div>
                <div class="content">
                    <div class="memo-content">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam quae ipsum dolores fugiat numquam possimus modi doloremque reprehenderit. Reprehenderit odio consequuntur repellendus! Et blanditiis dolore ea, harum vel vero temporibus.
                    </div>
                    <div class="pic-content">
                        <img src="asset/Screenshot (1).png" alt="" class="post-pic">
                    </div>
                    <div class="post-bars">
                        <div class="comment-bar">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <path d="M21.5,0H2.5C1.122,0,0,1.121,0,2.5V20H7.106l3.897,3.283c.286,.254,.645,.38,1.001,.38,.353,0,.703-.123,.979-.368l3.985-3.295h7.032V2.5c0-1.379-1.121-2.5-2.5-2.5Zm1.5,19h-6.392l-4.276,3.535c-.19,.171-.476,.169-.675-.009l-4.187-3.526H1V2.5c0-.827,.673-1.5,1.5-1.5H21.5c.827,0,1.5,.673,1.5,1.5V19ZM12,7H6v-1h6v1Zm-6,3h12v1H6v-1Zm0,4h12v1H6v-1Z"/>
</svg>
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                        <div class="comment-bar">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
  <path d="M22.773,8.721h0c-.95-1.093-2.325-1.721-3.773-1.721h-4.87l.809-2.833c.57-3.009-3.887-4.446-5.152-1.602l-2.801,4.435h-2.485C2.019,7,0,9.019,0,11.5v6c0,2.481,2.019,4.5,4.5,4.5h13.795c2.477,0,4.605-1.849,4.951-4.302l.705-5c.202-1.435-.228-2.885-1.178-3.978ZM1,17.5v-6c0-1.93,1.57-3.5,3.5-3.5h2.512l-.011,13h-2.5c-1.93,0-3.5-1.57-3.5-3.5Zm21.961-4.941l-.705,5c-.277,1.962-1.979,3.441-3.961,3.441H8l.012-13.754,2.645-4.192c.772-1.868,3.601-.985,3.308,.895l-.979,3.414c-.043,.151-.014,.313,.081,.438,.095,.125,.242,.199,.399,.199h5.533c2.36-.054,4.344,2.228,3.961,4.559Z"/>
</svg>
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                        <div class="comment-bar">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M23.98,16.18l-3.35,3.35c-.3,.3-.7,.47-1.13,.47s-.83-.17-1.13-.47l-3.35-3.35,.71-.71,3.28,3.28V6.5c0-.83-.67-1.5-1.5-1.5H8.5l-1-1h10c1.38,0,2.5,1.12,2.5,2.5v12.25l3.28-3.28,.71,.71Zm-17.48,2.82c-.83,0-1.5-.67-1.5-1.5V5.75l3.3,3.3,.71-.71-3.37-3.37c-.6-.61-1.66-.61-2.27,0L0,8.33l.71,.71,3.29-3.29v11.75c0,1.38,1.12,2.5,2.5,2.5h9.5l-1-1H6.5Z"/></svg>

                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                        <div class="comment-bar">
                            <div class="icon">
                                <img src="asset/spotlight.png" alt="" class="icon_pic">
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                        <div class="comment-bar">
                            <div class="icon">
                                <svg id="Layer_1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m14.934 8.555c-1.456-.573-2.434-2.05-2.434-3.674v-.951c.86-.224 1.5-1 1.5-1.929 0-1.103-.897-2-2-2s-2 .897-2 2c0 .929.64 1.705 1.5 1.929v.951c0 2.031 1.232 3.882 3.066 4.605 2.693 1.062 4.434 3.619 4.434 6.515 0 3.86-3.141 7-7 7-3.521 0-6.442-2.612-6.929-6h2.136l-3.207-3.207v2.207c0 4.411 3.589 8 8 8s8-3.589 8-8c0-3.309-1.988-6.231-5.066-7.445zm-3.934-6.555c0-.551.448-1 1-1s1 .449 1 1-.448 1-1 1-1-.449-1-1z"/></svg>
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                        <div class="comment-bar">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="512" height="512"><path d="M19.333,14.667a4.66,4.66,0,0,0-3.839,2.024L8.985,13.752a4.574,4.574,0,0,0,.005-3.488l6.5-2.954a4.66,4.66,0,1,0-.827-2.643,4.633,4.633,0,0,0,.08.786L7.833,8.593a4.668,4.668,0,1,0-.015,6.827l6.928,3.128a4.736,4.736,0,0,0-.079.785,4.667,4.667,0,1,0,4.666-4.666ZM19.333,2a2.667,2.667,0,1,1-2.666,2.667A2.669,2.669,0,0,1,19.333,2ZM4.667,14.667A2.667,2.667,0,1,1,7.333,12,2.67,2.67,0,0,1,4.667,14.667ZM19.333,22A2.667,2.667,0,1,1,22,19.333,2.669,2.669,0,0,1,19.333,22Z"/></svg>
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="post">
                <div class="user_profile">
                    <div class="user_avatar">
                        <img src="asset/Screenshot (1).png" alt="" class="avatar">
                    </div>
                    <div class="user_details">
                        <div class="user_acc-name">John Doe</div>
                        <div class="user_username">@john_doe</div>
                    </div>

                </div>
                <div class="content">
                    <div class="memo-content">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam quae ipsum dolores fugiat numquam possimus modi doloremque reprehenderit. Reprehenderit odio consequuntur repellendus! Et blanditiis dolore ea, harum vel vero temporibus.
                    </div>
                    <div class="pic-content">
                        <img src="asset/Screenshot (1).png" alt="" class="post-pic">
                    </div>
                </div>
                <div class="post-bars">
                    <div class="comment-bar">
                        <div class="icon">
                            0
                        </div>
                        <div class="number">
                            10
                        </div>
                    </div>
                    <div class="comment-bar">
                        <div class="icon">
                            0
                        </div>
                        <div class="number">
                            10
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const expand_btn = document.querySelector(".expand-btn");

        let activeIndex;

        expand_btn.addEventListener("click", () => {
            document.body.classList.toggle("collapsed");
        });



        const searchInput = document.querySelector(".search__wrapper input");

        searchInput.addEventListener("focus", (e) => {
            document.body.classList.remove("collapsed");
        });
    </script>
</body>

</html>
