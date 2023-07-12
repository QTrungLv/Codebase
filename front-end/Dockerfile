FROM node:18-alpine

WORKDIR /frontend/src

COPY package*.json ./

COPY . .

RUN npm run build

EXPOSE 3000

CMD npm run dev