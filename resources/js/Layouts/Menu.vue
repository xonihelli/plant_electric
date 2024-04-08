
<template>
  <ul class="metismenu" id="menu">
    <br />

    <li>
      <a :href="route('dashboard')">
        <div class="menu-icon">
          <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M7.5 18.3333V10H12.5V18.3333"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text"> Dashboard electricos</span>
      </a>
    </li>

    <li class="menu-title">Administra tus datos</li>
    <li>
      <a :href="route('rooms.room.index')">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M15.8381 12.7317C16.4566 12.7317 16.9757 13.2422 16.8811 13.853C16.3263 17.4463 13.2502 20.1143 9.54009 20.1143C5.43536 20.1143 2.10834 16.7873 2.10834 12.6835C2.10834 9.30245 4.67693 6.15297 7.56878 5.44087C8.19018 5.28745 8.82702 5.72455 8.82702 6.36429C8.82702 10.6987 8.97272 11.8199 9.79579 12.4297C10.6189 13.0396 11.5867 12.7317 15.8381 12.7317Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M19.8848 9.1223C19.934 6.33756 16.5134 1.84879 12.345 1.92599C12.0208 1.93178 11.7612 2.20195 11.7468 2.5252C11.6416 4.81493 11.7834 7.78204 11.8626 9.12713C11.8867 9.5459 12.2157 9.87493 12.6335 9.89906C14.0162 9.97818 17.0914 10.0862 19.3483 9.74467C19.6552 9.69835 19.88 9.43204 19.8848 9.1223Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text"> Cuartos electricos</span>
      </a>
    </li>
    <li>
      <a :href="route('charge.directive.index')">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.64111 13.5497L9.38482 9.9837L12.5145 12.4421L15.1995 8.97684"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <ellipse
              cx="18.3291"
              cy="3.85021"
              rx="1.76201"
              ry="1.76201"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M13.6808 2.86012H7.01867C4.25818 2.86012 2.54651 4.81512 2.54651 7.57561V14.9845C2.54651 17.7449 4.22462 19.6915 7.01867 19.6915H14.9058C17.6663 19.6915 19.3779 17.7449 19.3779 14.9845V8.53213"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Tableros de distribución</span>
      </a>
    </li>
    <li>
      <a :href="route('charge.sub-directive.index')">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M14.9732 2.52102H7.0266C4.25735 2.52102 2.52118 4.48177 2.52118 7.25651V14.7438C2.52118 17.5186 4.2491 19.4793 7.0266 19.4793H14.9723C17.7507 19.4793 19.4795 17.5186 19.4795 14.7438V7.25651C19.4795 4.48177 17.7507 2.52102 14.9732 2.52102Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M7.73657 11.0002L9.91274 13.1754L14.2632 8.82493"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Cargas Electricas</span>
      </a>
    </li>

    <!-- <li>
      <a :href="route('charge.directive.index')">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M14.9732 2.52102H7.0266C4.25735 2.52102 2.52118 4.48177 2.52118 7.25651V14.7438C2.52118 17.5186 4.2491 19.4793 7.0266 19.4793H14.9723C17.7507 19.4793 19.4795 17.5186 19.4795 14.7438V7.25651C19.4795 4.48177 17.7507 2.52102 14.9732 2.52102Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M7.73657 11.0002L9.91274 13.1754L14.2632 8.82493"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Tableros de Distribución</span>
      </a>
    </li>
    <li>
      <a :href="route('charge.sub-directive.index')">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M14.9732 2.52102H7.0266C4.25735 2.52102 2.52118 4.48177 2.52118 7.25651V14.7438C2.52118 17.5186 4.2491 19.4793 7.0266 19.4793H14.9723C17.7507 19.4793 19.4795 17.5186 19.4795 14.7438V7.25651C19.4795 4.48177 17.7507 2.52102 14.9732 2.52102Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M7.73657 11.0002L9.91274 13.1754L14.2632 8.82493"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Cargas Electricas</span>
      </a>
    </li> -->
    <!-- <li class="menu-title">Calculos</li>

    <li>
      <a href="project.html">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.75713 9.35157V15.64"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M11.0349 6.34253V15.64"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M15.2428 12.6746V15.64"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M15.2952 1.83333H6.70474C3.7103 1.83333 1.83331 3.95274 1.83331 6.95306V15.0469C1.83331 18.0473 3.70157 20.1667 6.70474 20.1667H15.2952C18.2984 20.1667 20.1666 18.0473 20.1666 15.0469V6.95306C20.1666 3.95274 18.2984 1.83333 15.2952 1.83333Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Projects</span>
      </a>
    </li>
    <li>
      <a href="reports.html">
        <div class="menu-icon">
          <svg
            width="22"
            height="22"
            viewBox="0 0 22 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M13.0974 14.0786H8.1474"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M11.2229 10.6388H8.14655"
              stroke="#888888"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <span class="nav-text">Reports</span>
      </a>
    </li> -->
  </ul>
</template>


