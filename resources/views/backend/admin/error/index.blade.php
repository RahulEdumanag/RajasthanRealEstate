 
     <style>
         /* public/css/errors.css */

         .error-container {
             display: flex;
             justify-content: center;
             align-items: center;
             height: 100vh;
             text-align: center;
         }

         .error-content {
             max-width: 400px;
             padding: 20px;
             border: 1px solid #ccc;
             border-radius: 8px;
             background-color: #fff;
         }

         .error-code {
             font-size: 80px;
             color: #dc3545;
             margin-bottom: 20px;
         }

         .error-message {
             font-size: 18px;
             margin-bottom: 10px;
         }

         .btn-primary {
             background-color: #007bff;
             border-color: #007bff;
             color: #fff;
         }

         .btn-primary:hover {
             background-color: #0056b3;
             border-color: #0056b3;
         }
     </style>
    <div class="error-container">
    <div class="error-content">
        <h1 class="error-code">404</h1>
        <p class="error-message">Sorry, the page you are looking for could not be found.</p>
        <p class="error-message">We are currently working to resolve this issue. Please try again later.</p>
        <a href="{{ URL::to('/admin/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
    </div>