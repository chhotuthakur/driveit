<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="Web site created using create-react-app" />
    <img
      alt="Logo"
      src="https://appproject.dhiwise.com/dhiwise-logo.png?c=&v="
      style="width: 0px; height: 0px; display: none"
    />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@11.0.6/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/index.css" />
    <link rel="stylesheet" type="text/css" href="./css/font.css" />
    <link rel="stylesheet" type="text/css" href="./css/styles.css" />
    <link rel="stylesheet" type="text/css" href="./css/components.css" />
    <link rel="stylesheet" type="text/css" href="./css/Home1.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.6/swiper-bundle.min.js" defer></script>
    <script>
      /**
       * Hydrate slider #slider
       */
      document.addEventListener("DOMContentLoaded", () => {
        const slider = document.querySelector("#slider");
        // Set max width and height to prevent slider from overflowing
        slider.style.maxWidth = getComputedStyle(slider).width;
        slider.style.maxHeight = getComputedStyle(slider).height;

        const sliderParent = slider.parentElement;
        const sliderTrack = document.querySelector("#slider > .swiper-wrapper");
        const slides = document.querySelectorAll("#slider > .swiper-wrapper > .swiper-slide");

        // Clone slides for infinite loop
        const slidesToShow = 2;
        const slidesRequired = 4;
        for (let i = 0; slides.length <= slidesToShow && i <= slidesRequired - 1; i++) {
          const index = i % slidesToShow;
          const clone = slides[index]?.cloneNode(true);
          clone?.setAttribute("cloned", "");
          sliderTrack?.appendChild(clone);
        }

        const swiper = new Swiper("#slider", {
          grabCursor: true,
          loop: true,
          slidesOffsetAfter: 0,
          slidesOffsetBefore: 0,
          slidesPerView: 2,
          navigation: {
            prevEl: "#slider-control-prev",
            nextEl: "#slider-control-next",
          },
          breakpoints: {
            0: { slidesPerView: 1 },
            551: { slidesPerView: 1 },
            1051: { slidesPerView: 2 },
          },
        });
      });
      /**
       * Handles the tab change functionality in a tablist
       */
      function handleTabs(/** @type {HTMLElement} */ target) {
        const tabs = /** @type {HTMLElement[]} */ (target.querySelectorAll('[role="tab"]'));
        const tabPanels = /** @type {HTMLElement[]} */ (target.querySelectorAll('[role="tabpanel"]'));
        const activeClassList = ["active"];

        function changeTab(/** @type {HTMLElement}*/ target) {
          target.focus();
          const controls = /** @type {string} */ (target.getAttribute("aria-controls"));

          for (const tab of tabs) {
            const isActiveTab = tab.id === target.id;
            const tabIndex = isActiveTab ? "0" : "-1";
            const ariaSelected = isActiveTab ? "true" : "false";

            tab.setAttribute("tabindex", tabIndex);
            tab.setAttribute("aria-selected", ariaSelected);
            isActiveTab ? tab.classList.add(...activeClassList) : tab.classList.remove(...activeClassList);
          }

          for (const panel of tabPanels) {
            const shouldHidePanel = panel.id !== controls;
            panel.hidden = shouldHidePanel;
            panel.style.display = shouldHidePanel ? "none" : "";
          }
        }

        function handleClickEvent(/** @type {MouseEvent} */ event) {
          changeTab(event.target);
        }

        function handleKeyboardEvent(/** @type {KeyboardEvent} */ event) {
          const key = event.key;
          const target = event.target;
          const index = [...tabs].findIndex((tab) => tab.id === target.id);

          switch (key) {
            case "ArrowLeft": {
              const prevTab = tabs[index - 1];
              if (prevTab) changeTab(prevTab);
              break;
            }

            case "ArrowRight": {
              const nextTab = tabs[index + 1];
              if (nextTab) changeTab(nextTab);
              break;
            }

            case "Home": {
              const firstTab = tabs[0];
              if (firstTab) changeTab(firstTab);
              break;
            }

            case "End": {
              const lastTab = tabs[tabs.length - 1];
              if (lastTab) changeTab(lastTab);
              break;
            }
          }
        }

        for (const tab of tabs) {
          tab.style.cursor = "pointer";
          tab.addEventListener("click", handleClickEvent);
          tab.addEventListener("keydown", handleKeyboardEvent);
        }
      }
      /**
       * Hydrate tablist(s)
       */
      document.addEventListener("DOMContentLoaded", () => {
        const tabLists = /** @type {NodeListOf<HTMLElement>} */ (document.querySelectorAll('[role="tablist"]'));
        for (const tabList of tabLists) handleTabs(tabList);
      });
    </script>
  </head>
  <body>
    <div class="home">
      <div class="row_three">
        <div class="row_two container-xs">
          <div class="columnpickup">
            <div>
              <div class="columnhowitwoks">
                <header class="headerheaderlog">
                  <div class="rowheaderlogo">
                    <img src="public/images/img_header_logo.png" alt="headerlogo" class="headerlogo_one" />
                    <ul class="rowselfdrives">
                      <li>
                        <a href="#">
                          <p class="selfdrives ui heading size-textxl">Self Drives</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p class="selfdrives ui heading size-textxl">Cabs</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p class="selfdrives ui heading size-textxl">Luxury Cars</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p class="selfdrives ui heading size-textxl">Contact us</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p class="selfdrives ui heading size-textxl">About Us</p>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="rowsearch">
                    <label class="search">
                      <div class="dhi-group-2">
                        <img src="public/images/img_search.svg" alt="search" class="search-1" />
                      </div>
                      <input name="search" placeholder="What are you looking for...." type="text" />
                    </label>
                    <button class="flex-row-center-center log_in">Log In</button>
                    <button class="flex-row-center-center sign_up">Sign Up</button>
                  </div>
                </header>
                <img src="public/images/img_vector_1.svg" alt="vectorone" class="vectorone_one" />
                <h1 class="slogans ui heading size-heading6xl">
                  No matter where you’re going to, we’ll take you there
                </h1>
                <div class="clients">
                  <div class="row-1">
                    <h2 class="class-_ ui heading size-textxs">+</h2>
                  </div>
                  <h3 class="duration ui heading size-textxs">
                    2,500 people booked Tommorowland Event in last 24 hours
                  </h3>
                </div>
                <div class="rowarrowdown">
                  <img src="public/images/img_arrow_down.svg" alt="arrowdown" class="arrowdown_one" />
                  <img src="public/images/img_arrow_down.svg" alt="arrowdown" class="arrowdown_one" />
                </div>
              </div>
            </div>
            <div>
              <div class="row">
                <div class="rowpickup">
                  <div class="pickup">
                    <p class="pickup-1 ui text size-texts">Pick-up Location</p>
                    <div class="linkedin">
                      <input name="linkedin" type="date" placeholder="Search a location" />
                    </div>
                  </div>
                  <div class="pickup">
                    <p class="pickup-1 ui text size-texts">Pick-up date</p>
                    <div class="calendar">
                      <input name="calendar" type="date" placeholder="12/12/2023" />
                    </div>
                  </div>
                  <div class="pickup">
                    <p class="pickup-1 ui text size-texts">Drop-off Location</p>
                    <div class="linkedin_one">
                      <input name="linkedin_one" type="date" placeholder="Search a location" />
                    </div>
                  </div>
                  <div class="pickup">
                    <p class="pickup-1 ui text size-texts">Drop-off date</p>
                    <div class="calendar">
                      <input name="calendar_one" type="date" placeholder="12/12/2023" />
                    </div>
                  </div>
                </div>
                <div class="rowfind_a">
                  <div class="rowchoosevehicl">
                    <select name="choosevehicle" class="choosevehicle">
                      <option value="option1">Option1</option>
                      <option value="option2">Option2</option>
                      <option value="option3">Option3</option>
                    </select>
                    <select name="triptype" class="triptype">
                      <option value="option1">Option1</option>
                      <option value="option2">Option2</option>
                      <option value="option3">Option3</option>
                    </select>
                  </div>
                  <button class="flex-row-center-center find_a_vehicle">Find a Vehicle</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="column container-xs">
        <div class="listrentbybrand">
          <div class="columnrentbybra container-xs">
            <div class="rowrentbybrands">
              <h2 class="rentbybrands ui heading size-headinglg">Rent by Brands</h2>
              <div class="button-1">
                <a href="#">
                  <h3 class="view_all ui heading size-headingxs">View all</h3>
                </a>
                <img src="public/images/img_arrow_right.svg" alt="view_all" class="view_all_two" />
              </div>
            </div>
            <div class="home-1">
              <div class="columntoyota">
                <img src="public/images/img_clock.svg" alt="toyota" class="toyota_one" />
                <h4 class="toyota_two ui heading size-textlg">Toyota</h4>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_settings.svg" alt="ford" class="ford_one" />
                <h5 class="ford_two ui heading size-textlg">Ford</h5>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_tesla_svg.svg" alt="tesla" class="tesla_one" />
                <h6 class="ford_two ui heading size-textlg">Tesla</h6>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_close.svg" alt="toyota" class="toyota_one-1" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columntoyota-2">
                <img src="public/images/img_honda_svg.svg" alt="toyota" class="toyota_one-2" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_user.svg" alt="toyota" class="toyota_one-3" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_chevrolet_png.png" alt="chevrolet" class="chevrolet_one" />
                <p class="chevrolet_two ui heading size-textlg">Chevrolet</p>
              </div>
              <div class="columnbmw_one">
                <img src="public/images/img_bmw_logo_icon_145840.svg" alt="bmw" class="tesla_one" />
                <p class="ford_two ui heading size-textlg">BMW</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_mercedes_benz_l.svg" alt="mercedesbenz" class="tesla_one" />
                <p class="ford_two ui heading size-textlg">Mercedes-Benz</p>
              </div>
              <div class="flex-col-center-center columnhyundai">
                <img src="public/images/img_hyundai_svg.svg" alt="hyundai" class="hyundai_one" />
                <p class="toyota_two ui heading size-textlg">Hyundai</p>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_audi_svg.svg" alt="audi" class="audi_one" />
                <p class="ford_two ui heading size-textlg">Audi</p>
              </div>
              <div class="columnkia_one">
                <img src="public/images/img_vector.svg" alt="kia" class="kia_one" />
                <p class="ford_two ui heading size-textlg">KIA</p>
              </div>
            </div>
          </div>
          <div class="columnrentbybra container-xs">
            <div class="rowrentbybrands">
              <h5 class="rentbybrands ui heading size-headinglg">Rent by Brands</h5>
              <div class="button-1">
                <a href="#">
                  <p class="view_all ui heading size-headingxs">View all</p>
                </a>
                <img src="public/images/img_arrow_right.svg" alt="view_all" class="view_all_two" />
              </div>
            </div>
            <div class="home-1">
              <div class="columntoyota">
                <img src="public/images/img_clock.svg" alt="toyota" class="toyota_one" />
                <p class="toyota_two ui heading size-textlg">Toyota</p>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_settings.svg" alt="ford" class="ford_one" />
                <p class="ford_two ui heading size-textlg">Ford</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_tesla_svg.svg" alt="tesla" class="tesla_one" />
                <p class="ford_two ui heading size-textlg">Tesla</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_close.svg" alt="toyota" class="toyota_one-1" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columntoyota-2">
                <img src="public/images/img_honda_svg.svg" alt="toyota" class="toyota_one-2" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_user.svg" alt="toyota" class="toyota_one-3" />
                <p class="ford_two ui heading size-textlg">TOYOTA</p>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_chevrolet_png.png" alt="chevrolet" class="chevrolet_one" />
                <p class="chevrolet_two ui heading size-textlg">Chevrolet</p>
              </div>
              <div class="columnbmw_one">
                <img src="public/images/img_bmw_logo_icon_145840.svg" alt="bmw" class="tesla_one" />
                <p class="ford_two ui heading size-textlg">BMW</p>
              </div>
              <div class="columntesla_one">
                <img src="public/images/img_mercedes_benz_l.svg" alt="mercedesbenz" class="tesla_one" />
                <p class="ford_two ui heading size-textlg">Mercedes-Benz</p>
              </div>
              <div class="flex-col-center-center columnhyundai">
                <img src="public/images/img_hyundai_svg.svg" alt="hyundai" class="hyundai_one" />
                <p class="toyota_two ui heading size-textlg">Hyundai</p>
              </div>
              <div class="columnford_one">
                <img src="public/images/img_audi_svg.svg" alt="audi" class="audi_one" />
                <p class="ford_two ui heading size-textlg">Audi</p>
              </div>
              <div class="columnkia_one">
                <img src="public/images/img_vector.svg" alt="kia" class="kia_one" />
                <p class="ford_two ui heading size-textlg">KIA</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="column_two">
        <div id="tabList" role="tablist" aria-label="rowpopularcar" class="column_one">
          <div class="columnpopularca container-xs">
            <div class="columnourimpres">
              <h2 class="ourimpressive ui heading size-heading5xl">Our Impressive Collection of Cars</h2>
              <h3 class="description ui heading size-text2xl">
                Ranging from elegant sedans to powerful sports cars, all carefully selected to provide our customers
                with the ultimate driving experience.
              </h3>
            </div>
            <div class="rowpopularcar">
              <span
                class="popularcar active"
                id="tab01"
                role="tab"
                aria-controls="tabpanel01"
                aria-selected="true"
                tabindex="0"
              >
                Popular Car</span
              >
              <span
                class="popularcar"
                id="tab11"
                role="tab"
                aria-controls="tabpanel11"
                aria-selected="false"
                tabindex="-1"
              >
                Luxury Car</span
              >
              <span
                class="popularcar"
                id="tab21"
                role="tab"
                aria-controls="tabpanel21"
                aria-selected="false"
                tabindex="-1"
              >
                Vintage Car</span
              >
              <span
                class="popularcar"
                id="tab31"
                role="tab"
                aria-controls="tabpanel31"
                aria-selected="false"
                tabindex="-1"
              >
                Family Car</span
              >
              <span
                class="popularcar"
                id="tab41"
                role="tab"
                aria-controls="tabpanel41"
                aria-selected="false"
                tabindex="-1"
              >
                Off-Road Car</span
              >
            </div>
            <div id="tabpanel01" role="tabpanel" aria-labelledby="tab01" hidden class="rowaudi_a8_l tabcontent">
              <div class="gridaudi_a8_l">
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h4 class="measurement ui heading size-headingmd">Audi A8 L 2022</h4>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <h5 class="ui heading size-textmd">4,000</h5>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <h6 class="auto_two ui heading size-textmd">Auto</h6>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85_260x368.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h5 class="measurement ui heading size-headingmd">Nissan Maxima Platinum 2022</h5>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <p class="ui heading size-textmd">4,000</p>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Auto</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85_1.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h5 class="measurement ui heading size-headingmd">Porsche Cayenne GTS 2022</h5>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <p class="ui heading size-textmd">4,000</p>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Auto</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85_2.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h5 class="measurement ui heading size-headingmd">BMW M8 Coupe 2022</h5>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <p class="ui heading size-textmd">4,000</p>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Auto</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85_3.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h5 class="measurement ui heading size-headingmd">BMW X7 M50i 2022</h5>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <p class="ui heading size-textmd">4,000</p>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Auto</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
                <div class="cardetails">
                  <img src="public/images/img_rectangle_85_4.png" alt="audi_a8_l_2022" class="audi_a8_l_2022" />
                  <div class="column-1">
                    <div class="columnmeasureme">
                      <h5 class="measurement ui heading size-headingmd">Porsche Cayenne GTS 2022</h5>
                      <p class="ui text size-text8xl">
                        <span class="class-7890day-span"> 78.90</span>
                        <span class="class-7890day-span-1"> /day</span>
                      </p>
                    </div>
                    <div class="row-2">
                      <div class="row4000">
                        <div class="flex-col-center-center column4000">
                          <img src="public/images/img_speedometer_01.svg" alt="image" class="link_one" />
                          <p class="ui heading size-textmd">4,000</p>
                        </div>
                        <div class="flex-col-center-center columnauto_one">
                          <img src="public/images/img_settings_gray_900_04.svg" alt="auto" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Auto</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_users_01.svg" alt="4_person" class="link_one" />
                          <p class="auto_two ui heading size-textmd">4 Person</p>
                        </div>
                        <div class="flex-col-center-center column4_person">
                          <img src="public/images/img_thumbs_up.svg" alt="electric" class="link_one" />
                          <p class="auto_two ui heading size-textmd">Electric</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="flex-row-center-center rent_now">Rent Now</button>
                </div>
              </div>
            </div>
            <div
              style="display: none"
              id="tabpanel11"
              role="tabpanel"
              aria-labelledby="tab11"
              hidden
              class="rowaudi_a8_l tabcontent"
            >
              <span style="min-height: 1108px"> Luxury Car content</span>
            </div>
            <div
              style="display: none"
              id="tabpanel21"
              role="tabpanel"
              aria-labelledby="tab21"
              hidden
              class="rowaudi_a8_l tabcontent"
            >
              <span style="min-height: 1108px"> Vintage Car content</span>
            </div>
            <div
              style="display: none"
              id="tabpanel31"
              role="tabpanel"
              aria-labelledby="tab31"
              hidden
              class="rowaudi_a8_l tabcontent"
            >
              <span style="min-height: 1108px"> Family Car content</span>
            </div>
            <div
              style="display: none"
              id="tabpanel41"
              role="tabpanel"
              aria-labelledby="tab41"
              hidden
              class="rowaudi_a8_l tabcontent"
            >
              <span style="min-height: 1108px"> Off-Road Car content</span>
            </div>
            <button class="flex-row-center-center see_all_cars">
              <span> See all Cars</span>
              <img src="public/images/img_arrowleft.svg" alt="arrow_left" class="arrow_left" />
            </button>
          </div>
        </div>
      </div>
      <div class="column2021merce container-xs">
        <div>
          <div>
            <div class="columnhowitwoks">
              <h2 class="howitwoks ui heading size-heading4xl">How it woks</h2>
              <h3 class="description-1 ui heading size-textxl">
                Renting a luxury car has never been easier. Our streamlined process makes it simple for you to book and
                confirm your vehicle of choice online
              </h3>
              <div class="rowbookand">
                <div class="listbrowse_and">
                  <div class="browseandselect">
                    <div class="rowbrowse_and">
                      <div class="columnbrowse">
                        <img src="public/images/img_search_gray_900_04.svg" alt="browse_and" class="browse_and" />
                      </div>
                      <div class="columnbrowseand">
                        <h4 class="browseand ui heading size-headinglg">Browse and select</h4>
                        <h5 class="choosefromour ui heading size-textxl">
                          Choose from our wide range of premium cars, select the pickup and return dates and locations
                          that suit you best.
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="browseandselect">
                    <div class="rowbrowse_and">
                      <div class="columnbrowse">
                        <img src="public/images/img_calendar.svg" alt="browse_and" class="browse_and" />
                      </div>
                      <div class="columnbrowseand">
                        <h6 class="browseand ui heading size-headinglg">Book and confirm</h6>
                        <p class="choosefromour ui heading size-textxl">
                          Book your desired car with just a few clicks and receive an instant confirmation via email or
                          SMS.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="browseandselect">
                    <div class="rowbrowse_and">
                      <div class="columnbrowse">
                        <img
                          src="public/images/img_settings_gray_900_04_22x22.svg"
                          alt="browse_and"
                          class="browse_and"
                        />
                      </div>
                      <div class="columnbrowseand">
                        <h5 class="browseand ui heading size-headinglg">Enjoy your ride</h5>
                        <p class="choosefromour ui heading size-textxl">
                          Pick up your car at the designated location and enjoy your premium driving experience with our
                          top-quality service.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row_four">
                  <img src="public/images/img_image_35.png" alt="imagethirtyfive" class="imagethirtyfive" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="row2021mercedes">
            <div class="stack2021merced">
              <img src="public/images/img_rectangle_15.svg" alt="image" class="image" />
              <img src="public/images/img_rectangle_16.svg" alt="image" class="image_one" />
              <img src="public/images/img_2021_mercedes_b.png" alt="2021mercedesb" class="class-2021mercedesb" />
            </div>
            <div class="columnourservic">
              <h2 class="ourservices ui heading size-heading3xl">Our Services</h2>
              <div class="listcar_hire">
                <div class="userprofile">
                  <div class="rowcar_hire_one">
                    <img src="public/images/img_user_amber_a400.svg" alt="car_hire" class="car_hire_one" />
                    <h3 class="carhire ui heading size-headingxl">Car Hire</h3>
                  </div>
                  <h4 class="wepride ui heading size-text2xl">
                    We pride ourselves in always going the extra mile for our customers.
                  </h4>
                </div>
                <div class="userprofile-1">
                  <div class="rowcar_hire_one-1"></div>
                  <h5 class="wepride ui heading size-text2xl">
                    We pride ourselves in always going the extra mile for our customers.
                  </h5>
                </div>
                <div class="userprofile-1">
                  <div class="rowcar_hire_one-1"></div>
                  <h6 class="wepride ui heading size-text2xl">
                    We pride ourselves in always going the extra mile for our customers.
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="columnfellthebe">
            <p class="fellthebest ui text size-text10xl">Fell the best experience <br />with our luxury car</p>
            <div class="listbookwith">
              <div class="userprofile1">
                <img src="public/images/img_frame_2528.svg" alt="image" class="image-1" />
                <div class="flex-col-center-center columnbookwith">
                  <p class="bookwith ui text size-text7xl">Book with flexibility</p>
                  <p class="easilyfindcar ui text size-text3xl">Easily find car and book with no change fees.</p>
                </div>
              </div>
              <div class="userprofile1">
                <img src="public/images/img_frame_2528_amber_a400.svg" alt="image" class="image-1" />
                <div class="flex-col-center-center columnbookwith">
                  <p class="bookwith ui text size-text7xl">Trusted and free</p>
                  <p class="easilyfindcar ui text size-text3xl">
                    We’re completely free to use – no hidden charges or fees..
                  </p>
                </div>
              </div>
              <div class="userprofile1">
                <img src="public/images/img_frame_2533.svg" alt="image" class="image-1" />
                <div class="flex-col-center-center columnbookwith">
                  <p class="bookwith ui text size-text7xl">We know travel</p>
                  <p class="easilyfindcar ui text size-text3xl">
                    With 10 years of experience, we&#39;re ready to help find your perfect car
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="stackbuttom_one">
            <div class="buttom_one"></div>
            <div class="flex-col-center-center columnqualified">
              <div class="columnourpremiu">
                <div class="title-1">
                  <h2 class="ourpremium ui heading size-text5xl">Our Premium Services</h2>
                  <div class="lineone_one"></div>
                </div>
                <h3 class="carentisa ui heading size-textmd">
                  Carent is a reputable car rental company that offers a wide range of useful services for every taste.
                </h3>
              </div>
              <div class="list24_hours">
                <div class="flex-col-center-center supportsection">
                  <img src="public/images/img_user_amber_a400_46x46.svg" alt="24_hours" class="class-24_hours" />
                  <h4 class="duration-1 ui heading size-text2xl">24 Hours Support</h4>
                  <h5 class="wesupportyou ui heading size-textxs">We support you<br />all hours of the day,</h5>
                </div>
                <div class="flex-col-center-center supportsection">
                  <img src="public/images/img_close_amber_a400_46x46.svg" alt="24_hours" class="class-24_hours" />
                  <h6 class="duration-1 ui heading size-text2xl">Qualified Assurance</h6>
                  <p class="wesupportyou ui heading size-textxs">All cars have a <br />valid insurance.</p>
                </div>
                <div class="flex-col-center-center supportsection">
                  <img src="public/images/img_settings_amber_a400.svg" alt="24_hours" class="class-24_hours" />
                  <p class="duration-1 ui heading size-text2xl">GPS on Cars</p>
                  <p class="wesupportyou ui heading size-textxs">
                    All cars are equipped with<br />
                    GPS navigation system.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="section9">
            <div class="title">
              <h2 class="whatour ui heading size-text9xl">What Our Clients Say?</h2>
              <div class="lineone_three"></div>
            </div>
            <div class="rowarrowleft">
              <button id="slider-control-prev" class="arrowleft_one">
                <img src="public/images/img_arrow_left_amber_a400.svg" />
              </button>
              <div id="slider" class="slider swiper">
                <div class="swiper-wrapper">
                  <div class="dhi-group swiper-slide">
                    <div class="flex-col-center-center column-7">
                      <img src="public/images/img_ellipse_62.png" alt="image" class="image-4" />
                      <div class="columnkristinwa">
                        <h3 class="kristinwatson ui heading size-text6xl">Kristin Watson</h3>
                        <p class="irentedacar ui text size-text4xl">
                          I rented a car for a one-week trip from Carnet on the recommendation of my friend. Actually, I
                          am satisfied with them.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="dhi-group swiper-slide">
                    <div class="flex-col-center-center column-7">
                      <img src="public/images/img_ellipse_62_136x136.png" alt="image" class="image-4" />
                      <div class="columnkristinwa">
                        <h4 class="kristinwatson ui heading size-text6xl">Robert Fox</h4>
                        <p class="irentedacar ui text size-text4xl">
                          During my last trip, I used a Carent sport car . The car was completely clean and had enough
                          gas.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button id="slider-control-next" class="arrowleft_one"></button>
            </div>
          </div>
        </div>
        <div>
          <div class="downloadapp">
            <div class="rowdownload">
              <div class="columnforfaster">
                <div class="columndownload">
                  <button class="flex-row-center-center download">DOWNLOAD</button>
                  <h2 class="download-1 ui heading size-heading2xl">
                    <span class="download-span"> Download Driveit App for&nbsp;</span>
                    <span class="download-span-1"> FREE</span>
                  </h2>
                </div>
                <p class="forfaster ui text size-texts">For faster, easier booking and exclusive deals.</p>
                <div class="row_seven">
                  <a href="#">
                    <img src="public/images/img_image_2.png" alt="imagetwo" class="imagetwo_one" />
                  </a>
                  <a href="#">
                    <img src="public/images/img_image_3.png" alt="imagethree" class="imagetwo_one" />
                  </a>
                </div>
              </div>
            </div>
            <div class="iphone14pro">
              <div class="columnshadow">
                <img src="public/images/img_shadow.png" alt="shadow" class="shadow_one" />
                <div class="stackmain_one">
                  <img src="public/images/img_main.png" alt="main" class="main_one" />
                  <img src="public/images/img_iphone_14_pro_space.png" alt="iphone14pro" class="iphone14pro_one" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('includes.footer')  
      </div>
  </body>
</html>
