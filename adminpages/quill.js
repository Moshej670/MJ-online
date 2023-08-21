var Delta = Quill.import('delta');

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: true
  },
  placeholder: ' Whats good...',
  theme: 'snow'
});

var database = firebase.database();

var changesRef = database.ref('quillChanges');
changesRef.once('value').then(function(snapshot) {
  snapshot.forEach(function(childSnapshot) {
    var ops = childSnapshot.val();
    quill.updateContents(ops);
  });
});

var change = new Delta(); // Accumulate changes

quill.on('text-change', function(delta, oldDelta, source) {
  if (source === 'user') {
    change = change.compose(delta);
  }
});

setInterval(function() {
  if (change.length() > 0) {
    console.log('Saving changes', change);

    // Store the changes in Firebase
    var changesRef = database.ref('quillChanges').push();
    changesRef.set(change.ops);

    change = new Delta(); // Clear accumulated changes
  }
}, 5 * 1000);

window.onbeforeunload = function() {
  if (change.length() > 0) {
    return 'There are unsaved changes. Are you sure you want to leave?';
  }
};
