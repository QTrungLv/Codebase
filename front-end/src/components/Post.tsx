import { AiOutlinePlus, AiOutlineEdit, AiFillDelete } from 'react-icons/ai'

export default function Post({ detail, onEdit, onDelete }: any) {
    return (
        <>
            <div className="bold self-center mb-2 font-medium text-xl">{detail.title}</div>
            <div className="ml-4">{detail.description}</div>
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
        </>
    )
}
