import Image from 'next/image'

export default function Header() {
  return (
    <header className="mx-auto mb-16 flex justify-between items-center w-full">
      <div className="flex rounded-full border shadow-sm">
        <Image src="/avatar.png" alt="avatar" width="32" height="32" />
      </div>

      <div className="border px-6 py-2 rounded-full shadow-sm text-sm">
        <ul className="flex space-x-8">
          <li>About</li>
          <li>Posts</li>
          <li>Projects</li>
        </ul>
      </div>

      <div>action</div>
    </header>
  )
}