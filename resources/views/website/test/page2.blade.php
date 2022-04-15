
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
        }
        #c {
            width: 100vw;
            height: 100vh;
            display: block;
        }

    </style>
</head>
<body>
<canvas id="c"></canvas>
<script src="https://r105.threejsfundamentals.org/threejs/resources/threejs/r105/three.min.js"></script>
<script src="https://r105.threejsfundamentals.org/threejs/resources/threejs/r105/js/controls/OrbitControls.js"></script>

<script>
    'use strict';

    /* global THREE */

    function main() {
        const canvas = document.querySelector('#c');
        const renderer = new THREE.WebGLRenderer({canvas});
        renderer.autoClearColor = false;

        const fov = 75;
        const aspect = 2;  // the canvas default
        const near = 0.1;
        const far = 100;
        const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
        camera.position.z = 3;

        const controls = new THREE.OrbitControls(camera, canvas);
        controls.target.set(0, 0, 0);
        controls.update();

        const scene = new THREE.Scene();

        {
            const color = 0xFFFFFF;
            const intensity = 1;
            const light = new THREE.DirectionalLight(color, intensity);
            light.position.set(-1, 2, 4);
            scene.add(light);
        }

        const boxWidth = 1;
        const boxHeight = 1;
        const boxDepth = 1;
        const geometry = new THREE.BoxGeometry(boxWidth, boxHeight, boxDepth);

        function makeInstance(geometry, color, x) {
            const material = new THREE.MeshPhongMaterial({color});

            const cube = new THREE.Mesh(geometry, material);
            scene.add(cube);

            cube.position.x = x;

            return cube;
        }

        const cubes = [
            makeInstance(geometry, 0x44aa88,  0),
            makeInstance(geometry, 0x8844aa, -2),
            makeInstance(geometry, 0xaa8844,  2),
        ];

        const bgScene = new THREE.Scene();
        let bgMesh;
        {
            const loader = new THREE.TextureLoader();
            const texture = loader.load(
                'https://r105.threejsfundamentals.org/threejs/resources/images/equirectangularmaps/tears_of_steel_bridge_2k.jpg',
            );
            texture.magFilter = THREE.LinearFilter;
            texture.minFilter = THREE.LinearFilter;

            const shader = THREE.ShaderLib.equirect;
            const material = new THREE.ShaderMaterial({
                fragmentShader: shader.fragmentShader,
                vertexShader: shader.vertexShader,
                uniforms: shader.uniforms,
                depthWrite: false,
                side: THREE.BackSide,
            });
            material.uniforms.tEquirect.value = texture;
            const plane = new THREE.BoxBufferGeometry(2, 2, 2);
            bgMesh = new THREE.Mesh(plane, material);
            bgScene.add(bgMesh);
        }

        function resizeRendererToDisplaySize(renderer) {
            const canvas = renderer.domElement;
            const width = canvas.clientWidth;
            const height = canvas.clientHeight;
            const needResize = canvas.width !== width || canvas.height !== height;
            if (needResize) {
                renderer.setSize(width, height, false);
            }
            return needResize;
        }

        function render(time) {
            time *= 0.001;

            if (resizeRendererToDisplaySize(renderer)) {
                const canvas = renderer.domElement;
                camera.aspect = canvas.clientWidth / canvas.clientHeight;
                camera.updateProjectionMatrix();
            }

            cubes.forEach((cube, ndx) => {
                const speed = 1 + ndx * .1;
                const rot = time * speed;
                cube.rotation.x = rot;
                cube.rotation.y = rot;
            });

            bgMesh.position.copy(camera.position);
            renderer.render(bgScene, camera);
            renderer.render(scene, camera);

            requestAnimationFrame(render);
        }

        requestAnimationFrame(render);
    }

    main();

</script>


</body>

</html>

{{--==============================--}}
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <style>--}}
{{--        *{--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            box-sizing: border-box;--}}
{{--            position: relative;--}}
{{--        }--}}
{{--        h1{--}}
{{--            font-family: sans-serif;--}}
{{--            font-size: 7em;--}}
{{--            color: #0b1c3c;--}}
{{--            transform: rotate(-15deg) skew(-10deg);--}}
{{--            text-align: center;--}}
{{--            text-shadow:--}}
{{--                1px 1px 0 red,--}}
{{--                3px 3px 0 red,--}}
{{--                4px 4px 0 red,--}}
{{--                5px 5px 0 red,--}}
{{--                7px 7px 0 red,--}}
{{--                10px 10px 20px #75ff9b;--}}


{{--        }--}}

{{--        .flex{--}}

{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--        }--}}
{{--        body{--}}
{{--            width:100vw;--}}
{{--            min-height: 100vw;--}}
{{--            background: #3ecfff;--}}
{{--        }--}}
{{--        .trail{--}}
{{--            width: 20px;--}}
{{--            height: 20px;--}}
{{--            border-radius: 50%;--}}
{{--            border: 1px solid #2ebd61;--}}
{{--            background: #1b1b21;--}}
{{--            position: fixed;--}}
{{--            animation: come 1s linear forwards;--}}
{{--        }--}}
{{--        @keyframes come {--}}
{{--            0%{--}}
{{--                transform: scale(0);--}}
{{--            }--}}
{{--            10%{--}}
{{--                transform: scale(1) translateY(0px);--}}
{{--                opacity: 1;--}}
{{--            }--}}
{{--            100%{--}}
{{--                transform: scale(1) translateY(50px);--}}
{{--                opacity: 0;--}}
{{--            }--}}

{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body class="flex">--}}
{{--<div>--}}





{{--<h1>mouse trail <br> in html</h1>--}}
{{--<script>--}}
{{--    var body=document.body;--}}
{{--    document.addEventListener('mousemove',(e)=>{--}}
{{--        var elem=document.createElement('div');--}}
{{--        elem.setAttribute('class','trail')--}}
{{--        elem.setAttribute('style','left: ${e.clientX -10}px; top: ${e.clientY -10}px;');--}}
{{--        elem.onanimationend=()=>{--}}
{{--            elem.remove();--}}
{{--        }--}}
{{--        body.insertAdjacentElement('beforeend',elem);--}}
{{--    })--}}


{{--</script>--}}


{{--</div>--}}
{{--</body>--}}

{{--</html>--}}
