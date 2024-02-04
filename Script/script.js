// Data For Demostration


let modelData = []


// Get Our Models Data from PHP Server
fetch('Server/getModelsData.php')
  .then(res => res.json())
  .then(data => {

    console.log("Data is Downloaded!");

    // Save the Return Json Data
    modelData = data;

    // Load All Models into the Scene
    loadAllModels();

    // Load the First Model UI into the Scene
    loadModelData(modelData[0]['modelName']);

  })
  .catch(error => console.error(error))


// Basic DOM Elements OF UI
let modelFuntionBackground = document.getElementById("modelBackground");
let modelNameDisplay = document.getElementById("modelName");
let modelHeading = document.getElementById("modelHeading");
let modeContent = document.getElementById("modelContent");
let btns = document.querySelectorAll('.operations .btn');
let footer = document.getElementById("footer");
let mainView = document.getElementById("mainView");
let modelSelectionBtns = document.getElementById("modelSelectionBtns");


// This Function Will Load All the Models from The Data Base
function loadAllModels() {

  // Loop Through All Modes So that All will get inserted
  for (let i = 0; i < modelData.length; i++) {

    // Create Selection Buttons for Each Model
    let newSelectModelButton = document.createElement("button");
    newSelectModelButton.setAttribute("style", "margin: 5px;font-family: " + modelData[i]['fontFamily'] + ";font-size: 20px;background-color: " + modelData[i]['primaryColor'] + ";border: 2px solid white;");
    newSelectModelButton.setAttribute("class", "btn");
    newSelectModelButton.setAttribute("type", "button");
    newSelectModelButton.setAttribute("onclick", "loadModelData('" + modelData[i]['modelName'] + "');" + "resetAnimation();");
    newSelectModelButton.innerText = modelData[i]['modelName'];
    modelSelectionBtns.appendChild(newSelectModelButton)
  }
}

let selectedModel = 0;

// load a Specific Model Data in to the Website
function loadModelData(modelName) {

  // Look For a Model in modelData
  for (let i = 0; i < modelData.length; i++) {

    // Model is Find
    if (modelData[i]['modelName'] == modelName) {

      // Load Model Data into the Website
      selectedModel = i;

      // First We Display Our Model
      document.getElementById(modelData[i]['modelName']).style.display = "block";

      // Set the Model Name, Font and Color
      modelNameDisplay.innerText = modelData[i]['modelHeading'];
      modelNameDisplay.style.fontFamily = modelData[i]['fontFamily'];
      modelNameDisplay.style.color = modelData[i]['primaryColor'];

      // Display The Model Basic Imformation
      modelHeading.innerText = modelData[i]['tagLine'];
      modelHeading.style.color = modelData[i]['primaryColor'];
      modelHeading.style.fontFamily = modelData[i]['fontFamily'];
      modeContent.innerText = modelData[i]['description'];

      // Set the BackGround Color
      modelFuntionBackground.style.backgroundColor = modelData[i]['primaryColor'];
      footer.style.backgroundColor = modelData[i]['primaryColor'];
      mainView.style.backgroundColor = modelData[i]['primaryColor'];

      // Set Basic UI Buttons
      for (let k = 0; k < btns.length; k++) {
        const btn = btns[k];
        btn.style.backgroundColor = modelData[i]['secondaryColor'];
        btn.addEventListener('mouseover', function () {
          btn.style.backgroundColor = modelData[i]['backgroundColor'];
          btn.style.color = "white";
        });
        btn.addEventListener('mouseout', function () {
          btn.style.backgroundColor = modelData[i]['secondaryColor'];;
        });
      }

      let btn = document.getElementById('buyButton');
      btn.style.backgroundColor = modelData[i]['secondaryColor'];
      btn.addEventListener('mouseover', function () {
        btn.style.backgroundColor = modelData[i]['backgroundColor'];
        btn.style.color = "white";
      });
      btn.addEventListener('mouseout', function () {
        btn.style.backgroundColor = modelData[i]['secondaryColor'];;
      });

      // Load Images of the Model
      let displayImageLocation = document.getElementById("imageDisplayLocation");
      displayImageLocation.innerText = "";
      for (let k = 0; k < modelData[i]['renderImages'].length; k++) {
        let div = document.createElement("div");
        div.setAttribute("class", "col centerText")
        let img = document.createElement("img");
        img.setAttribute("class", "rounded modal-image");
        img.setAttribute("src", modelData[i]['renderImages'][k]);
        img.setAttribute("style", "width: 100px");
        img.setAttribute("onclick", "displayModal('" + modelData[i]['renderImages'][k] + "')")
        let p = document.createElement("p");
        p.setAttribute("style", "color: white;");
        p.innerText = modelData[i]['modelName'] + (k + 1);
        div.appendChild(img)
        div.appendChild(p)
        displayImageLocation.appendChild(div);
      }

      // ModelInitalization is Done
      console.log(modelName + " data is loaded!");
    }
    else {
      // Make Sure Other Models are Not Showing
      document.getElementById(modelData[i]['modelName']).style.display = "none";
    }
  }

}

// Change Camera Depending Upon its Type
function changeCamera(type) {
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__" + type).setAttribute('set_bind', 'true');
}

// This Function Will Reset the Animation of Current Mode to Orginal
function resetAnimation() {

  // Set the Default Location
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__Shape_IndexedFaceSet_TRANSFORM").setAttribute("translation", modelData[selectedModel]['modelTranslation']);
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__Shape_IndexedFaceSet_TRANSFORM").setAttribute("rotation", modelData[selectedModel]['modelRotation']);

  // Set the Default Animation
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__move").setAttribute("key", "0 0.5 1");
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__move").setAttribute("keyValue", "0 0 0 0 10 0 0 0 0");

  // Set the Default Rotation
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("key", "");
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("keyValue", "");

  console.log(modelData[selectedModel]['modelName'] + " Animation is Reset!");

}


// This Code Will be Used For Animation
let isAnimating = 0;
function rotateModel(rotationPoint) {

  document.getElementById(modelData[selectedModel]['modelName'] + "Space__move").setAttribute("key", "");
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__move").setAttribute("keyValue", "");

  // Rotate Model on X Axis
  if (rotationPoint == 'X') {
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("key", "0 0.5 1");
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("keyValue", "0 0 0 0 1 0 0 3.14 1 0 0 6.28");
  }


  // Rotate Model on Y Axis
  if (rotationPoint == 'Y') {
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("key", "0 0.5 1");
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("keyValue", "0 0 0 0 0 1 0 3.14 0 1 0 6.28");
  }

  // Rotate Model on Y Axis
  if (rotationPoint == 'Z') {
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("key", "0 0.5 1");
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__rotate").setAttribute("keyValue", "0 0 0 0 0 0 1 3.14 0 0 1 6.28");
  }

}

// Change the Head Ligh of the Scene
let headLight = 1;
function headLightONOFF() {
  // Turn On
  if (headLight == 0) {
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__ModelHeadLight").setAttribute("headlight", "true");
    headLight = 1;
  }
  // Tuen Off
  else {
    document.getElementById(modelData[selectedModel]['modelName'] + "Space__ModelHeadLight").setAttribute("headlight", "false");
    headLight = 0;
  }
}


// Display a Model in Wire Frame Mode
function wireFrame() {
  let modelWire = document.getElementsByClassName("wire");
  for (let i = 0; i < modelWire.length; i++) {
    modelWire[i].runtime.togglePoints(true);
    modelWire[i].runtime.togglePoints(true);
  }
}

// Texture Swaping
function swapTexture() {
  let modelTexture = document.getElementById(modelData[selectedModel]['modelName'] + "Space__texture");
  if (modelTexture.url == "texture.jpg") {
    modelTexture.url = "swap.jpg";
  }
  else {
    modelTexture.url = "texture.jpg";
  }
  console.log(modelData[selectedModel]['modelName'] + " texture is changed!");
}

// Reset the Render Data From Model
function resetRender() {
  document.getElementById(modelData[selectedModel]['modelName'] + "Space__texture").url = "texture.jpg";
  console.log(modelData[selectedModel]['modelName'] + " texture is reseet!");
}

// Modal For Display Image In Full Screen
function displayModal(imgSrc) {
  document.getElementById("modal-body").innerHTML = "<img src='" + imgSrc + "' style='width:100%'>";
  $("#myModal").modal();
}

// Change the Color to Random
function restyle() {

  const pri = '#' + Math.floor(Math.random() * 16777215).toString(16);
  const sce = '#' + Math.floor(Math.random() * 16777215).toString(16);
  const bac = '#' + Math.floor(Math.random() * 16777215).toString(16);

  // Set the BackGround Color
  modelNameDisplay.style.color = pri;
  modelHeading.style.color = pri;
  modelFuntionBackground.style.backgroundColor = pri;
  footer.style.backgroundColor = pri;
  mainView.style.backgroundColor = pri;

  // Set Basic UI Buttons
  for (let k = 0; k < btns.length; k++) {
    const btn = btns[k];
    btn.style.backgroundColor = sce;
    btn.addEventListener('mouseover', function () {
      btn.style.backgroundColor = bac;
      btn.style.color = "white";
    });
    btn.addEventListener('mouseout', function () {
      btn.style.backgroundColor = sce;;
    });
  }

  let btn = document.getElementById('buyButton');
  btn.style.backgroundColor = sce;
  btn.addEventListener('mouseover', function () {
    btn.style.backgroundColor = bac;
    btn.style.color = "white";
  });
  btn.addEventListener('mouseout', function () {
    btn.style.backgroundColor = sce;;
  });
}

// Reset the Color to Current One
function reset() {
  loadModelData(modelData[selectedModel]['modelName']);
}