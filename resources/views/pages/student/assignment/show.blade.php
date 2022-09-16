@extends('layouts.app')

@section('title', 'Assignments')

@section('content')
        <div class="container" id="sessionDetailContainer" data-classid="66" data-courseid="42" data-classsize="16" data-classname="T2108M-APHL-Year2022">
            <ul class="breadcrumb none-list mg-0 mg-b-25 fs-14 text-normal">
                <li>
                    <a href="/home" class="text-decoration-none" title="Home">Home</a>
                </li>
                <li class="separator">/</li>
                <li>
                    <a href="/show-subject" class="text-decoration-none" title="Subject Name">
                        Subject Name
                    </a>
                </li>
                <li class="separator">/</li>
                <li><span title="Assignment">Assignment</span></li>
            </ul>

            <h1 class="session-title-page text-semibold fs-24">
                Assignment have been assigned
            </h1>
            <ul class="top-session-info mg-b-16 mg-0 none-list fs-14">
                <li class="full-mobile mg-r-24 mg-b-8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.75 3C19.5449 3 21 4.45507 21 6.25V17.75C21 19.5449 19.5449 21 17.75 21H6.25C4.45507 21 3 19.5449 3 17.75V6.25C3 4.45507 4.45507 3 6.25 3H17.75ZM19.5 8.5H4.5V17.75C4.5 18.7165 5.2835 19.5 6.25 19.5H17.75C18.7165 19.5 19.5 18.7165 19.5 17.75V8.5ZM7.75 14.5C8.44036 14.5 9 15.0596 9 15.75C9 16.4404 8.44036 17 7.75 17C7.05964 17 6.5 16.4404 6.5 15.75C6.5 15.0596 7.05964 14.5 7.75 14.5ZM12 14.5C12.6904 14.5 13.25 15.0596 13.25 15.75C13.25 16.4404 12.6904 17 12 17C11.3096 17 10.75 16.4404 10.75 15.75C10.75 15.0596 11.3096 14.5 12 14.5ZM7.75 10.5C8.44036 10.5 9 11.0596 9 11.75C9 12.4404 8.44036 13 7.75 13C7.05964 13 6.5 12.4404 6.5 11.75C6.5 11.0596 7.05964 10.5 7.75 10.5ZM12 10.5C12.6904 10.5 13.25 11.0596 13.25 11.75C13.25 12.4404 12.6904 13 12 13C11.3096 13 10.75 12.4404 10.75 11.75C10.75 11.0596 11.3096 10.5 12 10.5ZM16.25 10.5C16.9404 10.5 17.5 11.0596 17.5 11.75C17.5 12.4404 16.9404 13 16.25 13C15.5596 13 15 12.4404 15 11.75C15 11.0596 15.5596 10.5 16.25 10.5ZM17.75 4.5H6.25C5.2835 4.5 4.5 5.2835 4.5 6.25V7H19.5V6.25C19.5 5.2835 18.7165 4.5 17.75 4.5Z" fill="#666666"></path>
                    </svg>
                    08:00 30/05/2022 - 10:00 30/05/2022 GMT+07
                </li>
                <li class="mg-r-24">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.0242 7.57051L10.8009 8.48015L9.73088 8.48029L9.62911 8.48714C9.26304 8.5368 8.98088 8.8506 8.98088 9.23029L8.98773 9.33206C9.03739 9.69814 9.35119 9.98029 9.73088 9.98029L10.4339 9.98015L10.0459 11.5662L9.25 11.5671L9.14823 11.5739C8.78215 11.6236 8.5 11.9374 8.5 12.3171L8.50685 12.4189C8.55651 12.7849 8.8703 13.0671 9.25 13.0671L9.67887 13.0662L9.55583 13.5734L9.5383 13.6739C9.49956 14.0413 9.73733 14.3899 10.1061 14.4801L10.2066 14.4976C10.574 14.5364 10.9227 14.2986 11.0129 13.9298L11.2229 13.0662H12.7619L12.6444 13.5841L12.6284 13.6848C12.595 14.0528 12.8379 14.3979 13.208 14.4827L13.3087 14.4987C13.6766 14.5321 14.0217 14.2892 14.1065 13.9191L14.3009 13.0662L15.2416 13.0671L15.3433 13.0602C15.7094 13.0106 15.9916 12.6968 15.9916 12.3171L15.9847 12.2153C15.935 11.8492 15.6212 11.5671 15.2416 11.5671L14.6449 11.5662L15.0079 9.98015L15.7279 9.98029L15.8297 9.97345C16.1958 9.92378 16.4779 9.60999 16.4779 9.23029L16.4711 9.12852C16.4214 8.76245 16.1076 8.48029 15.7279 8.48029L15.3519 8.48015L15.4818 7.9162L15.4979 7.81547C15.5312 7.44755 15.2883 7.10244 14.9182 7.01765L14.8175 7.0016C14.4496 6.96825 14.1045 7.21112 14.0197 7.58122L13.8129 8.48015H12.3449L12.4812 7.92691L12.4988 7.82643C12.5375 7.45904 12.2997 7.11041 11.9309 7.02019C11.5286 6.92177 11.1226 7.16816 11.0242 7.57051ZM11.9779 9.98015H13.4689L13.1059 11.5662H11.5899L11.9779 9.98015ZM6.5 2C5.11929 2 4 3.11929 4 4.5V19.5C4 20.8807 5.11929 22 6.5 22H19.75C20.1642 22 20.5 21.6642 20.5 21.25C20.5 20.8358 20.1642 20.5 19.75 20.5H6.5C5.94772 20.5 5.5 20.0523 5.5 19.5H19.75C20.1642 19.5 20.5 19.1642 20.5 18.75V4.5C20.5 3.11929 19.3807 2 18 2H6.5ZM19 18H5.5V4.5C5.5 3.94772 5.94772 3.5 6.5 3.5H18C18.5523 3.5 19 3.94772 19 4.5V18Z" fill="#666666"></path>
                    </svg>
                    Subject: Name Subject
                </li>
                <li>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2501 2.00052C18.7689 2.00052 20.0001 3.23173 20.0001 4.75052V19.2488C20.0001 20.7675 18.7689 21.9988 17.2501 21.9988H6.75C5.23122 21.9988 4 20.7675 4 19.2488V4.75052C4 3.49158 4.84596 2.43023 6.00044 2.10391L5.99963 3.75071C5.69623 3.97877 5.5 4.34173 5.5 4.75052V19.2488C5.5 19.9391 6.05964 20.4988 6.75 20.4988H17.2501C17.9405 20.4988 18.5001 19.9391 18.5001 19.2488V4.75052C18.5001 4.06016 17.9405 3.50052 17.2501 3.50052L15 3.5V2L17.2501 2.00052ZM14.0001 2V10.1389C14.0001 10.886 13.2007 11.1665 12.7109 10.9033L12.6279 10.8512L10.5019 9.56575L8.42379 10.8172C7.92411 11.1779 7.09342 10.9564 7.00736 10.2594L7.0001 10.1389V2H14.0001ZM12.5001 3.5H8.5001V9.02327L10.0734 8.07421C10.3377 7.93602 10.6574 7.93341 10.8906 8.05036L12.5001 9.02396V3.5Z" fill="#666666"></path>
                    </svg>
                    Class: Name Class
                </li>
            </ul>
            <article class="session-detail-content row">
                <!--question-->
                <div class="col-12 col-lg-10 col-xl-10 session-main-content">
                    <div class="edn-tabs ui-tabs ui-widget ui-widget-content">
                        <!--question-->
                        <div class="session-category ui-tabs-panel ui-widget-content" id="session-category" aria-labelledby="session-category-tab" role="tabpanel" aria-hidden="false">
                            <ul class="session-activities mg-0 none-list">
                                <li class="group-lessons active current-section" data-id="748">
                                    <ul class="lesson" style="display:block">
                                        <!--foreach()-->
                                        <li class="lessons-item  activity-item-border activity-864 pending" data-subid="864">
                                            <div class="lessons-summary">
                                                <div class="lesson-item-thumb fs-14 text-lightbold">
                                                    <!--icon-->
                                                    <i class="lesson-type" style="flex: 0 0 30px; height: 24px">
                                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 8C0 3.58172 3.58172 0 8 0H20C24.4183 0 28 3.58172 28 8V20C28 24.4183 24.4183 28 20 28H8C3.58172 28 0 24.4183 0 20V8Z" fill="#FD9246"></path>
                                                            <g clip-path="url(#clip0_5268_6432)">
                                                                <path d="M23.2361 19.9705C23.7368 19.2061 24 18.3632 24 17.5158C24 14.6848 21.2575 12.3746 17.8333 12.2539C17.0355 14.6348 14.659 16.6282 11.1702 16.8785C11.1393 17.0891 11.1094 17.3 11.1094 17.5159C11.1094 20.4238 14.0007 22.7893 17.5547 22.7893C18.7729 22.7893 19.9557 22.5049 20.9925 21.9642L23.2178 22.7555C23.4266 22.8301 23.6668 22.78 23.8289 22.6171C23.9886 22.4568 24.0418 22.2188 23.9657 22.0054L23.2361 19.9705ZM15.7968 18.1018C15.7968 18.4256 15.5348 18.6877 15.2109 18.6877C14.887 18.6877 14.625 18.4256 14.625 18.1018V16.9299C14.625 16.606 14.887 16.3439 15.2109 16.3439C15.5348 16.3439 15.7968 16.606 15.7968 16.9299V18.1018ZM18.1406 18.1018C18.1406 18.4256 17.8785 18.6877 17.5546 18.6877C17.2308 18.6877 16.9687 18.4256 16.9687 18.1018V16.9299C16.9687 16.606 17.2308 16.3439 17.5546 16.3439C17.8785 16.3439 18.1406 16.606 18.1406 16.9299V18.1018ZM20.4843 18.1018C20.4843 18.4256 20.2223 18.6877 19.8984 18.6877C19.5745 18.6877 19.3125 18.4256 19.3125 18.1018V16.9299C19.3125 16.606 19.5745 16.3439 19.8984 16.3439C20.2223 16.3439 20.4843 16.606 20.4843 16.9299V18.1018Z" fill="white"></path>
                                                                <path d="M10.4453 5.21122C9.22594 5.21122 8.04379 5.4956 7.0075 6.03634L4.78219 5.24497C4.56934 5.16888 4.33074 5.22267 4.17109 5.38345C4.01145 5.54368 3.95824 5.78169 4.03434 5.99513L4.76391 8.02989C4.2632 8.79435 4 9.6372 4 10.4847C4 13.3926 6.89137 15.7581 10.4453 15.7581C13.9125 15.7581 16.8906 13.4692 16.8906 10.4847C16.8906 7.57669 13.9993 5.21122 10.4453 5.21122ZM10.4453 13.4143C10.1217 13.4143 9.85938 13.152 9.85938 12.8284C9.85938 12.5047 10.1217 12.2425 10.4453 12.2425C10.7689 12.2425 11.0312 12.5047 11.0312 12.8284C11.0312 13.152 10.7689 13.4143 10.4453 13.4143ZM11.0387 10.9681C11.0387 11.2914 10.7726 11.605 10.4493 11.605C10.1254 11.605 9.85934 11.3944 9.85934 11.0706C9.85934 10.4795 10.1746 10.0326 10.6432 9.86493C10.875 9.78138 11.0312 9.55993 11.0312 9.31275C11.0312 8.98946 10.7686 8.72681 10.4453 8.72681C10.122 8.72681 9.85934 8.98946 9.85934 9.31275C9.85934 9.63661 9.59727 9.89868 9.2734 9.89868C8.94953 9.89868 8.68746 9.63661 8.68746 9.31275C8.68746 8.34345 9.47598 7.55493 10.4453 7.55493C11.4146 7.55493 12.2031 8.34345 12.2031 9.31275C12.2031 10.0526 11.7351 10.7181 11.0387 10.9681Z" fill="white"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5268_6432">
                                                                    <rect width="20" height="20" fill="white" transform="translate(4 4)"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <!--end-icon-->
                                                    <div class="lessons-title lessons-title-sub acivity-sub-item text-normal">
                                                        <a class="activity-sum text-decoration-none" href="/assignment-details" title="Title Assignment">
                                                            <span class="activity-name text-semibold mg-b-10">
                                                                Title
                                                            </span>
                                                            <span class="activity-state-label fs-12 pending">
                                                                Description
                                                            </span>
                                                            <span class="activity-state-label fs-12 pending">
                                                                Source
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span style="display: none;" class="error-start-question">
                                                Cannot start this question when students are not grouped!
                                            </span>
                                        </li>
                                        <!--end-foreach()-->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/question-->

            </article>
        </div>
@endsection
