function loadFiles(type) {
  fetch('get_files.php?type=' + type)
    .then(res => res.text())
    .then(data => document.getElementById('file-cards').innerHTML = data);
}
