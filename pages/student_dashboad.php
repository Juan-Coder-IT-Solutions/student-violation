<div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="card card-md shadow-lg" style="border: none; background: #fff; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-header text-center py-4" style="background-color: #f8f9fa; padding: 30px; border-radius: 15px 15px 0 0;">
              <img src="./static/chmsu.png" alt="University Logo" class="img-fluid mb-3" style="max-width: 150px;">
              <h3 class="h2" style="font-weight: 700; font-size: 2rem; color: #007bff;">Student Dashboard</h3>
              <p class="text-muted" style="color: #888;">Welcome to your personalized student portal.</p>
            </div>
            <div class="card-body" style="padding: 30px;">
              <!-- Student Information Section -->
              <div class="row">
                <div class="col-md-6">
                  <div class="info-card shadow-sm mb-4 rounded-lg p-4" style="background-color: #f9f9f9; border-radius: 12px; transition: all 0.3s ease-in-out; border: 1px solid #ddd;">
                    <h5 class="card-title" style="font-size: 1.3rem; font-weight: 600; color: #333;">Name:</h5>
                    <p class="card-text" style="font-size: 1rem; color: #555;">John Doe</p>
                  </div>
                  <div class="info-card shadow-sm mb-4 rounded-lg p-4" style="background-color: #f9f9f9; border-radius: 12px; transition: all 0.3s ease-in-out; border: 1px solid #ddd;">
                    <h5 class="card-title" style="font-size: 1.3rem; font-weight: 600; color: #333;">Course:</h5>
                    <p class="card-text" style="font-size: 1rem; color: #555;">Bachelor of Science in Information Technology</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-card shadow-sm mb-4 rounded-lg p-4" style="background-color: #f9f9f9; border-radius: 12px; transition: all 0.3s ease-in-out; border: 1px solid #ddd;">
                    <h5 class="card-title" style="font-size: 1.3rem; font-weight: 600; color: #333;">Year:</h5>
                    <p class="card-text" style="font-size: 1rem; color: #555;">3rd Year</p>
                  </div>
                  <div class="info-card shadow-sm mb-4 rounded-lg p-4" style="background-color: #f9f9f9; border-radius: 12px; transition: all 0.3s ease-in-out; border: 1px solid #ddd;">
                    <h5 class="card-title" style="font-size: 1.3rem; font-weight: 600; color: #333;">Section:</h5>
                    <p class="card-text" style="font-size: 1rem; color: #555;">Section A</p>
                  </div>
                </div>
              </div>
              <!-- End of Student Information Section -->

              <!-- Additional Information or Actions -->
              <div class="text-center mt-5">
                <a href="#action-link" class="btn btn-primary btn-lg" style="background-color: #007bff; border-color: #007bff; padding: 15px 30px; font-size: 1.1rem; text-decoration: none; color: white; border-radius: 8px; transition: background-color 0.3s ease, transform 0.3s ease;">
                  View Violations & Activities
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Responsive Design in Style -->
  <style>
    /* Card hover effect */
    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Layout Adjustments */
    @media (max-width: 768px) {
      .card-body {
        padding: 20px;
      }

      .info-card {
        margin-bottom: 20px;
      }

      .text-center {
        text-align: left;
      }

      .btn-primary {
        width: 100%;
        padding: 15px;
        font-size: 1.2rem;
      }
    }

    @media (max-width: 576px) {
      .card-header {
        padding: 20px;
      }

      .card-title {
        font-size: 1.5rem;
      }

      .card-text {
        font-size: 0.9rem;
      }

      .info-card {
        padding: 15px;
      }

      .btn-primary {
        font-size: 1.1rem;
      }
    }
  </style>