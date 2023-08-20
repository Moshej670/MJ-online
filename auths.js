// FirebaseUI config
const uiConfig = {
  signInSuccessUrl: 'https://moshejanani.com/adminsucc', // Change this URL
  // ... other Firebase UI config options
};

// Listen for authentication state changes
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in dont do else
    
    document.getElementById('adminsign1').addEventListener('click', function() {
      firebase.auth().signOut().then(function() {
        // User is signed out
        window.location.href = 'https://moshejanani.com/admin'; // Redirect to sign-in page
      }).catch(function(error) {
        // An error happened
        console.error('Sign-out error:', error);
      });
    });
    document.getElementById('adminsign2').addEventListener('click', function() {
      firebase.auth().signOut().then(function() {
        // User is signed out
        window.location.href = 'https://moshejanani.com/'; // Redirect to home page
      }).catch(function(error) {
        // An error happened
        console.error('Home sign-out error:', error);
      });
    });
  }
  
  else {
    // User is not signed in, redirect to sign-in page
    window.location.href = 'https://moshejanani.com/admin'; // Change this URL
  }
});

