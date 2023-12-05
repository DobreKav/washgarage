<!-- login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Car Wash App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        #login-container {
            background-color: #2fab82;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        #cat-image {
            width: 100px; /* Adjust the size of the cat image */
            position: absolute;
            pointer-events: none;
        }

        .eye {
            width: 25px; /* Adjust the size of the eyes */
            height: 25px;
            background-color: #000;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .pupil {
            width: 5px; /* Adjust the size of the pupils */
            height: 5px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div id="login-container">
        <h2 class="text-center mb-4">Најави се</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Корисничко име:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Лозинка:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Логирај се</button>
        </form>
        <div id="cat-image">
            <div class="eye" id="left-eye">
                <div class="pupil" id="left-pupil"></div>
            </div>
            <div class="eye" id="right-eye">
                <div class="pupil" id="right-pupil"></div>
            </div>
        </div>
        <p class="text-center mt-3">Немате сметка <a href="register.php">Најави се тука</a>.</p>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const catImage = document.getElementById('cat-image');
            const leftEye = document.getElementById('left-eye');
            const rightEye = document.getElementById('right-eye');
            const leftPupil = document.getElementById('left-pupil');
            const rightPupil = document.getElementById('right-pupil');

            document.addEventListener('mousemove', function (e) {
                const x = e.clientX;
                const y = e.clientY;

                // Calculate the angle for eyes to follow the cursor
                const angle = Math.atan2(y - window.innerHeight / 2, x - window.innerWidth / 2);

                // Set eye position
                const eyeDistance = 1; // Adjust the distance between eyes
                const eyeX = Math.cos(angle) * eyeDistance;
                const eyeY = Math.sin(angle) * eyeDistance;

                leftEye.style.transform = `translate(${eyeX}px, ${eyeY}px)`;
                rightEye.style.transform = `translate(${eyeX}px, ${eyeY}px)`;

                // Set pupil position
                const pupilDistance = 7; // Adjust the distance between pupils
                const pupilX = Math.cos(angle) * pupilDistance;
                const pupilY = Math.sin(angle) * pupilDistance;

                leftPupil.style.transform = `translate(-50%, -50%) translate(${pupilX}px, ${pupilY}px)`;
                rightPupil.style.transform = `translate(-50%, -50%) translate(${pupilX}px, ${pupilY}px)`;
            });
        });
    </script>
</body>
</html>