<?php
session_start();

// Define session expiration time (in seconds)
define('SESSION_TIMEOUT', 100);  // 5 minutes (300 seconds)

// Function to check if the session is expired
function isSessionExpired($last_activity)
{
    return (time() - $last_activity) > SESSION_TIMEOUT;
}

// Function to handle concurrent session limit
function manageConcurrentSessions($user_id)
{
    // Start or resume session
    if (!isset($_SESSION['sessions'])) {
        $_SESSION['sessions'] = array();  // Initialize session storage
    }

    // Check for user session limit and expiration
    $sessions = $_SESSION['sessions'];
    $current_time = time();

    // Remove expired sessions
    foreach ($sessions as $key => $session) {
        if (isSessionExpired($session['last_activity'])) {
            unset($sessions[$key]);
        }
    }

    // Check if user already has 3 active sessions
    if (count($sessions) >= 3) {
        // Limit to 3 concurrent sessions: Remove the oldest session
        $oldest_session_key = array_keys($sessions, min(array_column($sessions, 'last_activity')))[0];
        unset($sessions[$oldest_session_key]);
    }

    // Create new session if not exceeding limit
    $sessions[] = [
        'user_id' => $user_id,
        'last_activity' => $current_time
    ];

    // Save sessions back into the session storage
    $_SESSION['sessions'] = $sessions;
}

// Example: Using a user ID for session tracking
$user_id = 'user123';  // This can be dynamically set based on logged-in user

// Manage the concurrent sessions
manageConcurrentSessions($user_id);

// Set session expiration time
$_SESSION['last_activity'] = time();

// Display session info
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Session Management for User: <?php echo $user_id; ?></h2>
    <div class="alert alert-info">
        <strong>Note:</strong> The maximum number of concurrent sessions for each user is limited to 3. 
        Sessions expire after 5 minutes of inactivity.
    </div>

    <?php if (isSessionExpired($_SESSION['last_activity'])): ?>
        <div class="alert alert-danger" role="alert">
            Session has expired!
        </div>
    <?php else: ?>
        <div class="alert alert-success" role="alert">
            Session is active.
        </div>
    <?php endif; ?>

    <h3>Current Active Sessions:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Session ID</th>
                <th>Last Activity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['sessions'])) {
                foreach ($_SESSION['sessions'] as $session) {
                    echo "<tr>";
                    echo "<td>" . $session['user_id'] . "</td>";
                    echo "<td>" . date('Y-m-d H:i:s', $session['last_activity']) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
