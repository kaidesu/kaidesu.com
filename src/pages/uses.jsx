import Head from 'next/head'

import { Card } from '@/components/Card'
import { Section } from '@/components/Section'
import { SimpleLayout } from '@/components/SimpleLayout'

function ToolsSection({ children, ...props }) {
  return (
    <Section {...props}>
      <ul role="list" className="space-y-16">
        {children}
      </ul>
    </Section>
  )
}

function Tool({ title, href, children }) {
  return (
    <Card as="li">
      <Card.Title as="h3" href={href}>
        {title}
      </Card.Title>
      <Card.Description>{children}</Card.Description>
    </Card>
  )
}

export default function Uses() {
  return (
    <>
      <Head>
        <title>Uses - kai desu.</title>
        <meta
          name="description"
          content="Software I use, gadgets I love, and other things I recommend."
        />
      </Head>
      <SimpleLayout
        title="Software I use, gadgets I love, and other things I recommend."
        intro="I get asked a lot about the things I use to build software, stay productive, or buy to fool myself into thinking I’m being productive when I’m really just procrastinating. Here’s a big list of all of my favorite stuff."
      >
        <div className="space-y-20">
          <ToolsSection title="Workstation">
            <Tool title="Macbook Pro">
              ...
            </Tool>
            <Tool title="Magic Trackpad - Black Multi-Touch Surface">
              ...
            </Tool>
            <Tool title="Vissles LP85">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Development tools">
            <Tool title="VS Code">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Design">
            <Tool title="Sketch">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Productivity">
            <Tool title="Notion">
              ...
            </Tool>
            <Tool title="Spotify">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Mobile">
            <Tool title="iPhone 14 Pro Max">
              ...
            </Tool>
            <Tool title="iPad Air 4th Generation">
              ...
            </Tool>
            <Tool title="Airpod Pro 2nd Generation">
              ...
            </Tool>
            <Tool title="Fitbit Versa 2">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Gaming">
            <Tool title="Nintendo Switch OLED">
              ...
            </Tool>
          </ToolsSection>
          <ToolsSection title="Japanese">
            <Tool title="みんなの日本語">
              ...
            </Tool>
            <Tool title="はじめての日本語能力試験 単語">
              ...
            </Tool>
            <Tool title="iTalki">
              ...
            </Tool>
            <Tool title="mochi">
              ...
            </Tool>
          </ToolsSection>
        </div>
      </SimpleLayout>
    </>
  )
}
