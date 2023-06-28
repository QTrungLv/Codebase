"use client"

import { ChangeEvent, Suspense, useEffect, useRef, useState } from "react";
import Loading from "./loading";
import Post from "@/components/Post";
import { PostInterface } from "@/interface/Post";
import axios from "axios";
import { AiOutlinePlus, AiOutlineEdit, AiFillDelete } from 'react-icons/ai'
import { typeCRUD } from "@/utils/types";
import { create, show, update, destroy } from "@/services/PostServices";

export default function CodeBase() {

    const [title, setTitle] = useState<string>("")
    const [description, setDescription] = useState<string>("");

    const [details, setDetails] = useState<PostInterface[]>([])
    const [showForm, setShowForm] = useState<boolean>(false)

    const [type, setType] = useState<number>(0)
    const [idPost, setIdPost] = useState<number>(-1)

    const handleButtonClick = () => {
        setShowForm(true)
    };

    useEffect(() => {
        async function getPost() {
            await show((res: any) => {
                if (res.success) {

                    setDetails([...res.data])

                } else {
                    console.log(res)
                }
            })
        }
        getPost()

    }, [])

    const onEdit = (id: number) => {
        setIdPost(id)
        setType(2)
        setTitle(details[id - 1].title);
        setDescription(details[id - 1].description);
        setShowForm(true);
        console.log(id + " " + type)
    }

    const onDelete = (id: number) => {
        setIdPost(id)
        setType(3)
        setTitle(details[id - 1].title);
        setDescription(details[id - 1].description);
        setShowForm(true);
        console.log(id + " " + idPost)

    }

    const onCancel = () => {
        setTitle('');;
        setDescription('')
        setShowForm(false);
        setType(0);
        setIdPost(-1);
    }

    const handleChangeTitle = (event: ChangeEvent<HTMLInputElement>) => {
        setTitle(event.target.value);
    }

    const handleChangeDescription = (event: ChangeEvent<HTMLInputElement>) => {
        setDescription(event.target.value);
    }

    const handleFormSubmit = async (event: React.FormEvent<HTMLButtonElement>) => {
        event.preventDefault();
        switch (type) {
            //Create
            case 0: {
                const data = {
                    title: title,
                    description: description
                }

                await create(data, (res: any) => {
                    if (res.success) {
                        console.log(res.data)
                        //setDetails(res.data)
                    } else {
                        console.log(res)
                    }
                })
            };


            case 1: {

            };

            //Update
            case 2: {
                const data = {
                    title: title,
                    description: description
                }

                await update(data, idPost, (res: any) => {
                    if (res.success) {
                        console.log(res.data)
                        //setDetails(res.data)
                    } else {
                        console.log(res)
                    }
                })
            };

            //Delete
            case 3: {

                await destroy(idPost, (res: any) => {
                    if (res.success) {
                        console.log(res.data)
                        //setDetails(res.data)
                    } else {
                        console.log(res)
                    }
                })
            };
            default: {

            }
        }

    }

    return (
        <div className="p-10">
            {
                showForm ? (
                    <div className="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-400 bg-opacity-80">
                        <form className="border-2 border-black border-solid p-10 bg-gray-300 text-white">
                            <h1 className="text-center font-bold text-2xl">POST INFO</h1>
                            <label className="mt-2 font-medium block">Title:</label>
                            <input
                                className="border border-black border-solid mb-2 w-full px-2 py-1 text-black"
                                value={title}
                                onChange={handleChangeTitle}
                                type="text"
                                required />

                            <label className="mt-2 font-medium block">Description:</label>
                            <input
                                className="border border-black border-solid mb-2 w-full px-2 py-1 text-black"
                                value={description}
                                onChange={handleChangeDescription}
                                type="text"
                                required
                            />

                            <div className="flex justify-between mt-3">
                                <button
                                    className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    onClick={handleFormSubmit}
                                >{typeCRUD[type]}</button>
                                <button onClick={onCancel} className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                            </div>
                        </form>
                    </div>
                ) : <></>
            }

            <div className="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-col-1 gap-4">
                {details ? details.map((detail: any) => (
                    <div
                        key={detail.id}
                        className="rounded border-2 border-black border-solid flex p-4 m-6  flex-col "
                    >
                        <Post details={detail} />
                        <div className="flex flex-row justify-end mt-2">
                            <button
                                className="text-green-500 border-r-2 border-solid flex-row flex items-center justify-center pr-2"
                                onClick={() => onEdit(detail.id)}
                            >
                                <AiOutlineEdit />
                                Edit
                            </button>
                            <button
                                className="text-red-500 flex items-center justify-center pl-2"
                                onClick={() => onDelete(detail.id)}
                            >
                                <AiFillDelete />
                                Delete
                            </button>
                        </div>
                    </div>
                )) : <Suspense fallback={<Loading />} />}
                <div className="flex justify-center align-middle p-4">
                    <button className="rounded border-2 border-black border-solid flex m-10 justify-center items-center p-5 " onClick={handleButtonClick}>
                        <AiOutlinePlus size={40} />
                    </button>

                </div>
            </div>





        </div>
    )
}