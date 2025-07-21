<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ARILESHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <style>
                 body {
            margin: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }
        a-scene {
            height: 100vh;
            width: 100vw;
        }
        #ui {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            z-index: 999;
        }
        button {
            padding: 10px 15px;
            background: rgba(0,0,0,0.7);
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
        }
        #instructions {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            background: rgba(0,0,0,0.5);
            padding: 10px;
            z-index: 999;
        } 
    </style>
</head>
<body>
    <div id="ui">
        <button id="placeBtn">Place Model</button>
        <button id="scaleUpBtn">+</button>
        <button id="scaleDownBtn">-</button>
        <button id="rotateLeftBtn">↻ Rotate Left</button>
        <button id="rotateRightBtn">↺ Rotate Right</button>
    </div>

    <a-scene 
        vr-mode-ui="enabled: false"
        arjs="sourceType: webcam; trackingMethod: best; debugUIEnabled: false;"
        renderer="logarithmicDepthBuffer: true; antialias: true;"
        embedded>

        <a-assets>
            <!-- Example model from Google's model-viewer examples -->
            <a-asset-item id="astronaut" src="{{ asset('assets/models/product.gltf') }}"></a-asset-item>
        </a-assets>

        <!-- AR plane visualization -->
        <a-entity 
            ar-plane="minWidth: 0.5; minHeight: 0.5" 
            material="color: #00AAFF; opacity: 0.4; side: double"
            visible="false">
        </a-entity>

        <!-- The model that will be placed -->
        <a-entity 
            id="model" 
            gltf-model="#astronaut"
            visible="false"
            scale="0.3 0.3 0.3"
            shadow="receive: false"
            follow-camera
            rotation="0 180 0">
        </a-entity>

        <!-- Camera and lighting -->
        <a-entity camera></a-entity>
        <a-entity light="type: ambient; color: #FFF; intensity: 0.5"></a-entity>
        <a-entity light="type: directional; color: #FFF; intensity: 0.8" position="-1 2 1"></a-entity>
    </a-scene>

    <script>
        // Component to make model follow camera until placed
        AFRAME.registerComponent('follow-camera', {
            tick: function() {
                if (!this.el.sceneEl.hasPlacement) {
                    const camera = document.querySelector('[camera]');
                    const position = camera.getAttribute('position');
                    this.el.setAttribute('position', {
                        x: position.x,
                        y: position.y - 0.5,  // Slightly below camera
                        z: position.z - 1.5   // In front of camera
                    });
                }
            }
        });
// Initialize scene
document.querySelector('a-scene').addEventListener('loaded', function() {
            const sceneEl = this;
            const model = document.getElementById('model');
            const plane = document.querySelector('[ar-plane]');
            const placeBtn = document.getElementById('placeBtn');
            const scaleUpBtn = document.getElementById('scaleUpBtn');
            const rotateLeftBtn = document.getElementById('rotateLeftBtn');
            const rotateRightBtn = document.getElementById('rotateRightBtn');
            const scaleDownBtn = document.getElementById('scaleDownBtn');
            
            // Track placement state
            sceneEl.hasPlacement = false;
            let currentScale = 0.3;
            let currentRotation = 100

            // Place model when button is clicked or screen is tapped
            function placeModel() {
                if (sceneEl.hasPlacement) return;
                
                console.log('placing model');
                // Make plane visible to help with placement
                model.setAttribute('visible', 'true');
                
                // On next tap, place the model
                function handlePlacement(evt) {
                    if (sceneEl.hasPlacement) return;
                    
                    // Get intersection point with detected plane
                    const intersection = evt.detail.intersection;
                    if (intersection) {
                        model.setAttribute('position', intersection.point);
                        sceneEl.hasPlacement = true;
                        plane.setAttribute('visible', 'false');
                        document.getElementById('instructions').textContent = "Model placed! Use buttons to adjust scale.";
                        sceneEl.removeEventListener('ar-hit-test-select', handlePlacement);
                    }
                }
                
                sceneEl.addEventListener('ar-hit-test-select', handlePlacement);
            }
            rotateLeftBtn.addEventListener('click', function() {
                currentRotation += 30;
                model.setAttribute('rotation', `0 ${currentRotation} 0`);
            });
            
            rotateRightBtn.addEventListener('click', function() {
                currentRotation -= 30;
                model.setAttribute('rotation', `0 ${currentRotation} 0`);
            });

            // Button event listeners
            placeBtn.addEventListener('click', placeModel);
            
            scaleUpBtn.addEventListener('click', function() {
                currentScale += 0.1;
                model.setAttribute('scale', currentScale + ' ' + currentScale + ' ' + currentScale);
            });
            
            scaleDownBtn.addEventListener('click', function() {
                if (currentScale > 0.1) {
                    currentScale -= 0.1;
                    model.setAttribute('scale', currentScale + ' ' + currentScale + ' ' + currentScale);
                }
            });

            // Also allow tap-to-place on mobile
            sceneEl.addEventListener('click', function() {
                if (!sceneEl.hasPlacement) {
                    placeModel();
                }
            });
        });

        
    </script>
</body>
</html>