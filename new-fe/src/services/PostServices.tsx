import axios from "axios";


export async function create(data: Object, callback: any): Promise<any> {
    axios.post(process.env.URL + "/api/post", data)
        .then((res) => {
            return callback(res.data);
        })
        .catch((err) => {
            return callback(err.response);
        })
}

export async function show(callback: any) {
    await axios.get(process.env.URL + "/api/post")
        .then(res => {
            return callback(res.data);
        })
        .catch((err) => {
            return callback(err.response.data)
        })
}

export async function update(data: Object, id: number, callback: any): Promise<any> {
    axios.put(process.env.URL + "/api/post/" + id, data)
        .then((res) => {
            return callback(res.data);
        })
        .catch((err) => {
            return callback(err.response);
        })
}

export async function destroy(id: number, callback: any): Promise<any> {
    axios.delete(process.env.URL + "/api/post/" + id)
        .then((res) => {
            return callback(res.data);
        })
        .catch((err) => {
            return callback(err.response);
        })
}