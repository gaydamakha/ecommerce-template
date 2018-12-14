#!/bin/sh
cd ./front
npm i
npm run build
cp -r ./build/static ../public/
cp -r ./build/index.html ../public/
