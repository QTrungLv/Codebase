"use client"

import { Suspense, useEffect, useRef, useState } from "react";
import Loading from "./loading";
import Post from "@/components/Post";
import { PostInterface } from "@/interface/Post";
import axios from "axios";
import { AiOutlinePlus, AiOutlineEdit, AiFillDelete } from 'react-icons/ai'


export default function CodeBase() {

    const [details, setDetails] = useState<PostInterface[]>([])
    const [showForm, setShowForm] = useState<boolean>(false)
    const [title, setTitle] = useState<String>("")
    const [description, setDescription] = useState<String>("");

    const handleButtonClick = () => {
        setShowForm(true)
    };

    useEffect(() => {
        async function getPost() {
            try {
                axios.get("http://127.0.0.1:8000/post")
                    .then(res => setDetails(res.data));
                    console.log(details)
                //console.log(post)

            } catch (error: any) {
                console.log(error.message)
            }
        }
        getPost()
    }, [])

    const onEdit = () => {

    }

    const createPost = () => {

    }

    const onDelete = () => {

    }

    const onCancel = () => {
        setShowForm(false)
    }

    return (
        <div className="p-10">
            <div className="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-col-1 gap-4">
                {/* {details ? details.map((detail: any) => (
                    <div key={detail.id} className="rounded border-2 border-black border-solid flex p-4 m-6  flex-col ">
                        <Post details={detail} />
                        <div className="flex flex-row justify-end mt-2">
                            <button className="text-green-500 border-r-2 border-solid flex-row flex items-center justify-center pr-2">
                                <AiOutlineEdit />
                                Edit
                            </button>
                            <button className="text-red-500 flex items-center justify-center pl-2">
                                <AiFillDelete />
                                Delete
                            </button>
                        </div>
                    </div>
                )) : <Suspense fallback={<Loading />} />} */}
                <div className="flex justify-center align-middle p-4">
                    <button className="rounded border-2 border-black border-solid flex m-10 justify-center items-center p-5 " onClick={handleButtonClick}>
                        <AiOutlinePlus size={40} />
                    </button>

                </div>
            </div>

            {
                showForm ? (
                    <div className=" self-center top-0 fixed">
                        <form className=" border-2 border-black border-solid p-10 float-left bg-gray-400 text-white">
                            <h1 className=" text-center font-bold text-lg">Post Info</h1>
                            <label>Title:</label>
                            <br />
                            <input className="border border-black border-solid mb-2" type="text" required />
                            <br />

                            <label>Description:</label>
                            <br />
                            <input className="border border-black border-solid  mb-2" type="text" required />
                            <br />
                            <input type="submit" value="Submit" />
                            <button onClick={onCancel}>Cancel</button>
                        </form>
                    </div>
                ) :<></>
            }



        </div>
    )
}