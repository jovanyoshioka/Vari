<?php

  echo '
    <div class="schedule-container">
      <!-- Days of Week Header -->
      <div class="days">
        <div>Sunday</div>
        <div>Monday</div>
        <div>Tuesday</div>
        <div>Wednesday</div>
        <div>Thursday</div>
        <div>Friday</div>
        <div>Saturday</div>
      </div>

      <!-- Times Sidebar -->
      <div class="times">
        <div>12am</div>
        <div>1am</div>
        <div>2am</div>
        <div>3am</div>
        <div>4am</div>
        <div>5am</div>
        <div>6am</div>
        <div>7am</div>
        <div>8am</div>
        <div>9am</div>
        <div>10am</div>
        <div>11am</div>
        <div>12pm</div>
        <div>1pm</div>
        <div>2pm</div>
        <div>3pm</div>
        <div>4pm</div>
        <div>5pm</div>
        <div>6pm</div>
        <div>7pm</div>
        <div>8pm</div>
        <div>9pm</div>
        <div>10pm</div>
        <div>11pm</div>
      </div>

      <!-- Grid/Classes -->
      <div class="grid" onscroll="scrollTimes(this)">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>

      <!-- Overview of Classes -->
      <div class="overview">
        <div>
          <!-- Color code -->
          <section style="background-color:red;"></section>
          <section>
            <h1>COSC 202</h1>
            <h2>Dr. Professor Comp</h2>
            <h2>In-Person, CRN: 421523</h2>
          </section>
          <section>
            <h2>Lecture: TR 9:50am - 11:05am</h2>
            <h2>Lab: W 8:00am - 10:00am</h2>
          </section>
          <section>
            <button>
              <i class="fas fa-times"></i>
            </button>
          </section>
        </div>
        <div>
          <!-- Color code -->
          <section style="background-color:blue;"></section>
          <section>
            <h1>MATH 231</h1>
            <h2>Dr. Professor Math</h2>
            <h2>In-Person, CRN: 128527</h2>
          </section>
          <section>
            <h2>Lecture: TR 11:30am - 12:45pm</h2>
          </section>
          <section>
            <button>
              <i class="fas fa-times"></i>
            </button>
          </section>
        </div>
        <div>
          <!-- Color code -->
          <section style="background-color:lime;"></section>
          <section>
            <h1>ECE 313</h1>
            <h2>Dr. Professor Stats</h2>
            <h2>In-Person, CRN: 912679</h2>
          </section>
          <section>
            <h2>Lecture: MWF 3:30pm - 4:20pm</h2>
          </section>
          <section>
            <button>
              <i class="fas fa-times"></i>
            </button>
          </section>
        </div>
      </div>

      <!-- Previous/Next Variation Buttons and Variation Numbers -->
      <footer>
        <button>
          <i class="fas fa-chevron-left"></i>
          Previous
        </button>
        <button>
          Next
          <i class="fas fa-chevron-right"></i>
        </button>
      </footer>
    </div>
  ';

?>